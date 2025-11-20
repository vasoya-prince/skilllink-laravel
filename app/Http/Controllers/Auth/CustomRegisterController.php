<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WorkerProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CustomRegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.custom-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'role' => ['required', Rule::in(['customer', 'worker'])],
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'city' => 'required',
            'password' => 'required|min:6|confirmed',

            // Worker-specific fields
            'experience_years' => 'nullable|required_if:role,worker',
            'hourly_rate' => 'nullable|required_if:role,worker',
            'bio' => 'nullable|required_if:role,worker',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'password' => Hash::make($request->password),
        ]);

        // If worker → create worker profile
        if ($request->role === 'worker') {
            WorkerProfile::create([
                'user_id' => $user->id,
                'experience_years' => $request->experience_years,
                'hourly_rate' => $request->hourly_rate,
                'bio' => $request->bio,
                'status' => 'pending',
                'rating' => 0
            ]);
        }

        // Log in user
        Auth::login($user);

        // Redirect based on role
        if ($user->role === 'worker') {
            return redirect()->route('worker.dashboard');
        }

        // return redirect()->route('customer.dashboard');
    }
}
