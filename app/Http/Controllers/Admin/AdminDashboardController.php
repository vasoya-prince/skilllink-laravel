<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\Skill;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'workers' => User::where('role', 'worker')->count(),
            'customers' => User::where('role', 'customer')->count(),
            'skills' => Skill::count(),
            'bookings' => Booking::count(),
        ]);
    }
}
