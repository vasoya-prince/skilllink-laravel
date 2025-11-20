<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class WorkerBookingController extends Controller
{
    // List bookings for authenticated worker
    public function index()
    {
        $workerId = auth()->id();

        // get bookings for this worker sorted by newest first
        $bookings = Booking::where('worker_id', $workerId)
            ->with('customer') // user model relation: customer()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('worker.bookings', compact('bookings'));
    }

    // Accept a booking (only if it belongs to this worker and is pending)
    public function accept($id)
    {
        $workerId = auth()->id();

        $booking = Booking::where('id', $id)
            ->where('worker_id', $workerId)
            ->where('status', 'pending')
            ->firstOrFail();

        $booking->status = 'accepted';
        $booking->save();

        return back()->with('success', 'Booking accepted.');
    }

    // Reject a booking (mark as cancelled)
    public function reject($id)
    {
        $workerId = auth()->id();

        $booking = Booking::where('id', $id)
            ->where('worker_id', $workerId)
            ->whereIn('status', ['pending', 'accepted'])
            ->firstOrFail();

        $booking->status = 'cancelled';
        $booking->save();

        return back()->with('success', 'Booking rejected/cancelled.');
    }

    // Mark a booking as completed
    public function complete($id)
    {
        $workerId = auth()->id();

        $booking = Booking::where('id', $id)
            ->where('worker_id', $workerId)
            ->where('status', 'accepted')
            ->firstOrFail();

        $booking->status = 'completed';
        $booking->save();

        return back()->with('success', 'Booking marked as completed.');
    }
}
