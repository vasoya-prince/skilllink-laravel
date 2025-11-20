<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WorkerProfile;

class AdminWorkerController extends Controller
{
    public function index()
    {
        // Get all workers with their profiles
        $workers = User::where('role', 'worker')->with('workerProfile')->get();

        return view('admin.workers.index', compact('workers'));
    }

    public function show($id)
    {
        $worker = User::where('id', $id)
                      ->where('role', 'worker')
                      ->with(['workerProfile', 'skills'])
                      ->firstOrFail();

        return view('admin.workers.show', compact('worker'));
    }

    public function approve($id)
    {
        $worker = WorkerProfile::where('user_id', $id)->firstOrFail();
        $worker->status = 'approved';
        $worker->save();

        return back()->with('success', 'Worker Approved Successfully!');
    }

    public function reject($id)
    {
        $worker = WorkerProfile::where('user_id', $id)->firstOrFail();
        $worker->status = 'rejected';
        $worker->save();

        return back()->with('success', 'Worker Rejected Successfully!');
    }
}
