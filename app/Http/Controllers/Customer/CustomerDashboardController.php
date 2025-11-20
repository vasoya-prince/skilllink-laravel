<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $customerId = auth()->id();

        return view('customer.dashboard', [
            'bookings' => Booking::where('customer_id', $customerId)->count(),
            'completed' => Booking::where('customer_id', $customerId)->where('status', 'completed')->count(),
        ]);
    }
}
