<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;

class AdminCustomerController extends Controller
{
    // List all customers
    public function index()
    {
        $customers = User::where('role', 'customer')->get();

        return view('admin.customers.index', compact('customers'));
    }

    // Customer details + booking list
    public function show($id)
    {
        $customer = User::where('id', $id)
                        ->where('role', 'customer')
                        ->firstOrFail();

        $bookings = Booking::where('customer_id', $id)
                           ->with('worker')
                           ->orderBy('created_at', 'desc')
                           ->get();

        return view('admin.customers.show', compact('customer', 'bookings'));
    }

    // Delete customer (optional)
    public function destroy($id)
    {
        $customer = User::where('id', $id)
                        ->where('role', 'customer')
                        ->firstOrFail();

        $customer->delete();

        return redirect()->route('admin.customers.index')
                         ->with('success', 'Customer deleted successfully.');
    }
}
