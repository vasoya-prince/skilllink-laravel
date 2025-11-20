<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WorkerProfile;
use Illuminate\Support\Facades\Auth;

class WorkerProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->workerProfile;

        return view('worker.profile', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'experience_years' => 'required|integer|min:0',
            'hourly_rate' => 'required|numeric|min:0',
            'bio' => 'nullable|string',
            'id_proof' => 'nullable|mimes:jpg,png,pdf|max:2048',
        ]);

        // Update user basic info
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
        ]);

        // Update worker profile
        $profile = $user->workerProfile;

        // Handle file upload
        if ($request->hasFile('id_proof')) {
            $path = $request->file('id_proof')->store('id_proofs', 'public');
            $profile->id_proof = $path;
        }

        $profile->bio = $request->bio;
        $profile->experience_years = $request->experience_years;
        $profile->hourly_rate = $request->hourly_rate;
        $profile->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
