<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function callback(Request $request)
    {
        $midtransService = new MidtransService();
        $notification = $request->all();
        
        $midtransService->handleCallback($notification);
        
        return response('OK', 200);
    }

    public function success(Request $request)
    {
        return view('payment.success');
    }

    public function pending(Request $request)
    {
        return view('payment.pending');
    }

    public function error(Request $request)
    {
        return view('payment.error');
    }

    public function payRemaining(Booking $booking)
    {
        if ($booking->user_id !== Auth::id() || $booking->status !== 'dp_paid') {
            abort(403);
        }

        if ($booking->payment_method === 'transfer') {
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
                return back()->with('error', 'Gagal membuat transaksi pembayaran.');
            }
        }

        // For cash payment, just show a message
        return back()->with('info', 'Untuk pembayaran cash, silakan hubungi admin untuk konfirmasi.');
    }
}