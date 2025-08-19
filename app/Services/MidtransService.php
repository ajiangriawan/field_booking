<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Booking;
use App\Models\Payment;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createTransaction(Booking $booking, $paymentType = 'dp')
    {
        $payment = Payment::create([
            'booking_id' => $booking->id,
            'payment_type' => $paymentType,
            'amount' => $paymentType === 'dp' ? $booking->dp_amount : $booking->remaining_amount,
            'payment_method' => 'transfer',
            'status' => 'pending'
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $booking->booking_code . '-' . $paymentType . '-' . $payment->id,
                'gross_amount' => (int) $payment->amount,
            ],
            'customer_details' => [
                'first_name' => $booking->user->name,
                'email' => $booking->user->email,
                'phone' => $booking->user->phone ?? '',
            ],
            'item_details' => [
                [
                    'id' => $booking->field->id,
                    'price' => (int) $payment->amount,
                    'quantity' => 1,
                    'name' => $booking->field->name . ' - ' . ucfirst($paymentType),
                ]
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            
            $payment->update([
                'midtrans_transaction_id' => $params['transaction_details']['order_id']
            ]);

            return [
                'success' => true,
                'snap_token' => $snapToken,
                'payment' => $payment
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function handleCallback($notification)
    {
        $orderId = $notification['order_id'];
        $statusCode = $notification['status_code'];
        $grossAmount = $notification['gross_amount'];
        $transactionStatus = $notification['transaction_status'];

        $payment = Payment::where('midtrans_transaction_id', $orderId)->first();
        
        if (!$payment) {
            return false;
        }

        $payment->update([
            'midtrans_response' => $notification
        ]);

        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            $payment->update([
                'status' => 'paid',
                'paid_at' => now()
            ]);

            $this->updateBookingStatus($payment);
            return true;
        } elseif ($transactionStatus == 'pending') {
            $payment->update(['status' => 'pending']);
        } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
            $payment->update(['status' => 'failed']);
        }

        return true;
    }

    private function updateBookingStatus(Payment $payment)
    {
        $booking = $payment->booking;
        
        if ($payment->payment_type === 'dp') {
            $booking->update(['status' => 'dp_paid']);
        } elseif ($payment->payment_type === 'remaining') {
            $booking->update(['status' => 'fully_paid']);
        }
    }
}