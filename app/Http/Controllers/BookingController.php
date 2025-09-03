<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\FieldSchedule;
use App\Models\Booking;
use App\Services\MidtransService;
use App\Services\FontteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $fields = Field::where('is_active', true)->get();
        return view('booking.index', compact('fields'));
    }

    public function show(Field $field)
    {
        // Ambil semua jadwal yang aktif untuk lapangan ini
        $fieldSchedules = \App\Models\FieldSchedule::where('field_id', $field->id)
            ->where('is_active', true)
            ->get();

        return view('booking.show', compact('field', 'fieldSchedules'));
    }

    public function getSchedules(Request $request, Field $field)
    {
        $date = $request->date;
        if (!$date) {
            return response()->json([], 400);
        }

        $carbonDate = \Carbon\Carbon::parse($date);
        $dayOfWeek = strtolower($carbonDate->format('l'));

        $schedules = \App\Models\FieldSchedule::where('field_id', $field->id)
            ->where('day_of_week', $dayOfWeek)
            ->where('is_active', true)
            ->get()
            ->map(function ($schedule) use ($carbonDate) {
                $schedule->is_booked = method_exists($schedule, 'isBooked') ? $schedule->isBooked($carbonDate) : false;
                return $schedule;
            });

        return response()->json($schedules);
    }

    public function store(Request $request)
    {
        $request->validate([
            'field_id' => 'required|exists:fields,id',
            'field_schedule_ids' => 'required|array|min:1',
            'field_schedule_ids.*' => 'exists:field_schedules,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'payment_method' => 'required|in:cash,transfer',
            'notes' => 'nullable|string'
        ]);

        // Ambil semua jadwal yang dipilih
        $schedules = FieldSchedule::whereIn('id', $request->field_schedule_ids)->get();

        // Cek apakah semua jadwal tersedia
        foreach ($schedules as $schedule) {
            if ($schedule->isBooked($request->booking_date)) {
                return back()->with('error', 'Salah satu jadwal sudah dibooking oleh orang lain.');
            }
        }

        // Hitung total harga
        $totalPrice = $schedules->sum('price');

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'field_id' => $request->field_id,
            'booking_date' => $request->booking_date,
            'total_price' => $totalPrice,
            'payment_method' => $request->payment_method,
            'notes' => $request->notes
        ]);

        // Simpan relasi ke jadwal
        $booking->fieldSchedules()->attach($request->field_schedule_ids);

        // Send WhatsApp notification to admin
        $fontteService = new FontteService();
        $fontteService->sendBookingNotification($booking);

        if ($request->payment_method === 'transfer') {
            $midtransService = new MidtransService();
            $result = $midtransService->createTransaction($booking, 'dp');

            if ($result['success']) {
                return view('booking.payment', [
                    'booking' => $booking,
                    'snap_token' => $result['snap_token'],
                    'payment' => $result['payment']
                ]);
            } else {
                return back()->with('error', 'Gagal membuat transaksi pembayaran.');
            }
        }

        return redirect()->route('dashboard')->with('success', 'Booking berhasil dibuat. Menunggu konfirmasi admin untuk pembayaran cash.');
    }
}
