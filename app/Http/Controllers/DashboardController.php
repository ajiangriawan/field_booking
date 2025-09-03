<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua booking milik user yang sedang login
        $bookings = Booking::with(['field', 'fieldSchedules'])->where('user_id', auth()->id())->get();

        return view('dashboard', compact('bookings'));
    }
}