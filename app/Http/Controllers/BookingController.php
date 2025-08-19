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
        return view('booking.show', compact('field'));
    }

    public function getSchedules(Request $request, Field $field)
    {
        $date = Carbon::parse($request->date);
        $dayOfWeek = strtolower($date->format('l'));

        $schedules = FieldSchedule::where('field_id', $field->id)
            ->where('day_of_week', $dayOfWeek)
            ->where('is_active', true)
            ->get()
            ->map(function ($schedule) use ($date) {
                $schedule->is_booked = $schedule->isBooked($date);
                return $schedule;
            });

        return response()->json($schedules);
    }

    public function store(Request $request)
    {
        $request->validate([
            'field_id' => 'required|exists:fields,id',
            'field_schedule_id' => 'required|exists:field_schedules,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'payment_method' => 'required|in:cash,transfer',
            'notes' => 'nullable|string'
        ]);

        // Check if schedule is available
        $schedule = FieldSchedule::findOrFail($request->field_schedule_id);
        if ($schedule->isBooked($request->booking_date)) {
            return back()->with('error', 'Jadwal sudah dibooking oleh orang lain.');
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'field_id' => $request->field_id,
            'field_schedule_id' => $request->field_schedule_id,
            'booking_date' => $request->booking_date,
            'total_price' => $schedule->price,
            'payment_method' => $request->payment_method,
            'notes' => $request->notes
        ]);

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