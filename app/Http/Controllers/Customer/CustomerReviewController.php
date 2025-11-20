<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Review;

class CustomerReviewController extends Controller
{
    public function create($id)
    {
        $customerId = auth()->id();

        $booking = Booking::where('id', $id)
            ->where('customer_id', $customerId)
            ->where('status', 'completed')
            ->firstOrFail();

        return view('customer.reviews.create', compact('booking'));
    }

    public function store(Request $request, $id)
    {
        $customerId = auth()->id();

        $booking = Booking::where('id', $id)
            ->where('customer_id', $customerId)
            ->where('status', 'completed')
            ->firstOrFail();

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        // Save new review
        Review::create([
            'worker_id' => $booking->worker_id,
            'customer_id' => $customerId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        // Update worker rating
        $avg = Review::where('worker_id', $booking->worker_id)->avg('rating');

        $booking->worker->workerProfile->update([
            'rating' => $avg
        ]);

        return redirect()->route('customer.bookings.index')
            ->with('success', 'Review submitted successfully!');
    }
}
