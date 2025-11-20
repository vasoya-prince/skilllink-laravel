<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class WorkerDashboardController extends Controller
{
    public function index()
    {
        $workerId = auth()->id();

        return view('worker.dashboard', [
            'pending' => Booking::where('worker_id', $workerId)->where('status', 'pending')->count(),
            'accepted' => Booking::where('worker_id', $workerId)->where('status', 'accepted')->count(),
            'completed' => Booking::where('worker_id', $workerId)->where('status', 'completed')->count(),
        ]);
    }
}
