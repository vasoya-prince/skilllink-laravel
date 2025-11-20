<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    // Show all bookings + filter
    public function index()
    {
        $status = request()->get('status');

        $query = Booking::with(['customer', 'worker'])
            ->orderBy('created_at', 'desc');

        if ($status && in_array($status, ['pending', 'accepted', 'completed', 'cancelled'])) {
            $query->where('status', $status);
        }

        $bookings = $query->get();

        return view('admin.bookings.index', compact('bookings', 'status'));
    }

    // Show single booking details
    public function show($id)
    {
        $booking = Booking::with(['customer', 'worker'])
            ->findOrFail($id);

        return view('admin.bookings.show', compact('booking'));
    }
}
