<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function callback(Request $request)
    {
        try {
            // Log incoming callback untuk debugging
            Log::info('Midtrans Callback Received:', [
                'all_data' => $request->all(),
                'headers' => $request->headers->all(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);
            
            $midtransService = new MidtransService();
            $notification = $request->all();
            
            // Skip signature validation untuk development/testing
            if (app()->environment('local')) {
                Log::info('Skipping signature validation in local environment');
            } else {
                // Validasi signature dari Midtrans hanya di production
                if (!$this->isValidSignature($notification)) {
                    Log::error('Invalid Midtrans signature', $notification);
                    return response('Invalid signature', 403);
                }
            }
            
            $result = $midtransService->handleCallback($notification);
            
            if ($result) {
                Log::info('Callback processed successfully');
                return response('OK', 200);
            } else {
                Log::error('Failed to process callback');
                return response('Failed', 400);
            }
            
        } catch (\Exception $e) {
            Log::error('Callback Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            return response('Error: ' . $e->getMessage(), 500);
        }
    }

    private function isValidSignature($notification)
    {
        // Implementasi validasi signature Midtrans
        $order_id = $notification['order_id'] ?? '';
        $status_code = $notification['status_code'] ?? '';
        $gross_amount = $notification['gross_amount'] ?? '';
        $server_key = config('midtrans.server_key');
        
        $signature = hash('sha512', $order_id . $status_code . $gross_amount . $server_key);
        
        return isset($notification['signature_key']) && 
               hash_equals($signature, $notification['signature_key']);
    }

    public function success(Request $request)
    {
        $order_id = $request->get('order_id');
        $booking = null;
        
        if ($order_id) {
            // Extract booking ID from order_id format
            $parts = explode('-', $order_id);
            if (count($parts) >= 2) {
                $booking_id = $parts[1];
                $booking = Booking::find($booking_id);
            }
        }
        
        return view('payment.success', compact('booking'));
    }

    public function pending(Request $request)
    {
        $order_id = $request->get('order_id');
        $booking = null;
        
        if ($order_id) {
            $parts = explode('-', $order_id);
            if (count($parts) >= 2) {
                $booking_id = $parts[1];
                $booking = Booking::find($booking_id);
            }
        }
        
        return view('payment.pending', compact('booking'));
    }

    public function error(Request $request)
    {
        $order_id = $request->get('order_id');
        $booking = null;
        
        if ($order_id) {
            $parts = explode('-', $order_id);
            if (count($parts) >= 2) {
                $booking_id = $parts[1];
                $booking = Booking::find($booking_id);
            }
        }
        
        return view('payment.error', compact('booking'));
    }

    public function payRemaining(Booking $booking)
    {
        // Validasi user dan status booking
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        
        if ($booking->status !== 'dp_paid') {
            return back()->with('error', 'Status booking tidak valid untuk pembayaran sisa.');
        }

        if ($booking->payment_method === 'transfer') {
            try {
                $midtransService = new MidtransService();
                $result = $midtransService->createTransaction($booking, 'remaining');

                if ($result['success']) {
                    return view('booking.payment', [
                        'booking' => $booking,
                        'snap_token' => $result['snap_token'],
                        'payment' => $result['payment'],
                        'payment_type' => 'remaining'
                    ]);
                } else {
                    return back()->with('error', 'Gagal membuat transaksi pembayaran: ' . ($result['message'] ?? 'Unknown error'));
                }
            } catch (\Exception $e) {
                Log::error('Payment creation failed: ' . $e->getMessage());
                return back()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi.');
            }
        }

        // For cash payment, just show a message
        return back()->with('info', 'Untuk pembayaran cash, silakan hubungi admin untuk konfirmasi.');
    }
}