<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with(['field', 'fieldSchedule', 'payments'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard', compact('bookings'));
    }
}