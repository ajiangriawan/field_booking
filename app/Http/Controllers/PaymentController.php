<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Services\FonnteService;

class PaymentController extends Controller
{
    public function callback(Request $request)
    {
        // 1. Inisialisasi variabel di awal
        $midtransService = new MidtransService();
        $notification = $request->all();

        try {
            Log::info('Midtrans Callback Received:', [
                'all_data' => $notification,
                'headers' => $request->headers->all(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);

            // 2. Periksa tanda tangan (signature)
            if (app()->environment('local')) {
                Log::info('Skipping signature validation in local environment');
            } else {
                if (!$this->isValidSignature($notification)) {
                    Log::error('Invalid Midtrans signature', $notification);
                    return response('Invalid signature', 403);
                }
            }

            // 3. Tangani callback dengan MidtransService
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
                'request_data' => $notification
            ]);
            return response('Error: ' . $e->getMessage(), 500);
        }
    }

    private function isValidSignature($notification)
    {
        $order_id = $notification['order_id'] ?? '';
        $status_code = $notification['status_code'] ?? '';
        $gross_amount = $notification['gross_amount'] ?? '';
        $server_key = config('midtrans.server_key');
        
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
        $booking = $this->getBookingFromOrderId($request->get('order_id'));

        return view('payment.success', compact('booking'));
    }

    public function pending(Request $request)
    {
        $booking = $this->getBookingFromOrderId($request->get('order_id'));
        return view('payment.pending', compact('booking'));
    }

    public function error(Request $request)
    {
        $booking = $this->getBookingFromOrderId($request->get('order_id'));
        return view('payment.error', compact('booking'));
    }

    private function getBookingFromOrderId($order_id)
    {
        if (!$order_id) {
            return null;
        }

        $parts = explode('-', $order_id);
        if (count($parts) >= 2) {
            $booking_id = $parts[1];
            return Booking::find($booking_id);
        }

        return null;
    }

    public function payRemaining(Booking $booking)
    {
        // Debug log untuk memastikan siapa usernya
        // Log::info('PayRemaining called', [
        //     'booking_id' => $booking->id,
        //     'booking_user_id' => $booking->user_id,
        //     'auth_id' => Auth::id(),
        //     'auth_user' => Auth::user()
        // ]);
        // dd([
        //     'auth_id' => Auth::id(),
        //     'auth_user' => Auth::user(),
        //     'booking_user_id' => $booking->user_id,
        // ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk melanjutkan pembayaran.');
        }

        if ((int) $booking->user_id !== (int) Auth::id()) {
            abort(403, 'Unauthorized - booking bukan milik Anda');
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

        return back()->with('info', 'Untuk pembayaran cash, silakan hubungi admin untuk konfirmasi.');
    }
}
