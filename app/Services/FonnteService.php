<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Booking;

class FonnteService
{
    private $apiKey;
    private $baseUrl = 'https://api.fonnte.com';

    public function __construct()
    {
        $this->apiKey = config('services.fonnte.api_key');
    }

    public function sendBookingNotification(Booking $booking)
    {
        $message = $this->formatBookingMessage($booking);
        $adminPhone = config('services.fonnte.admin_phone');

        return $this->sendMessage($adminPhone, $message);
    }

    public function sendMessage($adminPhone, $message)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => $this->apiKey,
            ])->post($this->baseUrl . '/send', [
                'target' => $adminPhone,
                'message' => $message,
            ]);

            \Log::info('Fonnte Response: ' . $response->body());

            return $response->successful();
        } catch (\Exception $e) {
            \Log::error('Fonnte Error: ' . $e->getMessage());
            return false;
        }
    }

    private function formatBookingMessage(Booking $booking)
    {
        $jadwalInfo = [];
        foreach ($booking->fieldSchedules as $schedule) {
            if ($schedule) {
                $jadwalInfo[] = $schedule->start_time . ' - ' . $schedule->end_time;
            }
        }

        return "🏟️ *BOOKING BARU* 🏟️\n\n" .
            "📋 Kode Booking: {$booking->booking_code}\n" .
            "👤 Customer: {$booking->user->name}\n" .
            "📞 Telp.: {$booking->user->phone}\n" .
            "🏟️ Lapangan: {$booking->field->name}\n" .
            "📅 Tanggal: {$booking->booking_date->format('d/m/Y')}\n" .
            "⏰ Waktu: " . implode(', ', $jadwalInfo) . "\n" .
            "💰 Total Harga: Rp " . number_format($booking->total_price, 0, ',', '.') . "\n" .
            "💳 DP (20%): Rp " . number_format($booking->dp_amount, 0, ',', '.') . "\n" .
            "💵 Sisa: Rp " . number_format($booking->remaining_amount, 0, ',', '.') . "\n" .
            "🔄 Metode Pembayaran: " . ucfirst($booking->payment_method) . "\n" ;
    }
}
