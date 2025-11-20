<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerBookingController extends Controller
{
    // Show booking form
    public function create($id)
    {
        $worker = User::where('id', $id)
                      ->where('role', 'worker')
                      ->with('workerProfile')
                      ->firstOrFail();

        return view('customer.book.create', compact('worker'));
    }

    // Save booking
    public function store(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'address' => 'required|min:5'
        ]);

        Booking::create([
            'worker_id' => $id,
            'customer_id' => auth()->id(),
            'date' => $request->date,
            'time' => $request->time,
            'address' => $request->address,
            'status' => 'pending',
            'total_price' => 0, // optional future feature
        ]);

        return redirect()->route('customer.dashboard')
                         ->with('success', 'Booking request sent!');
    }

        public function index()
    {
        $customerId = auth()->id();

        $bookings = Booking::where('customer_id', $customerId)
            ->with('worker')  // load worker details
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.bookings.index', compact('bookings'));
    }

    public function cancel($id)
    {
        $customerId = auth()->id();

        $booking = Booking::where('id', $id)
            ->where('customer_id', $customerId)
            ->whereIn('status', ['pending', 'accepted'])
            ->firstOrFail();

        $booking->status = 'cancelled';
        $booking->save();

        return back()->with('success', 'Booking cancelled successfully.');
    }

}
