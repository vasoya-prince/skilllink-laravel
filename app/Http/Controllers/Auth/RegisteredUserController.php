<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WorkerProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Show registration page.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate only basic user information
        $request->validate([
            'role' => ['required', 'in:customer,worker'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'city' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create new user
        $user = User::create([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'password' => Hash::make($request->password),
        ]);

        // If worker → create empty worker profile
        if ($user->role === 'worker') {
            WorkerProfile::create([
                'user_id' => $user->id,
                'experience_years' => 0,
                'hourly_rate' => 0,
                'bio' => '',
            ]);
        }

        // Fire registered event
        event(new Registered($user));

        // Make sure user is logged out after registration
        Auth::guard('web')->logout();

        // Redirect to login
        return redirect()
            ->route('login')
            ->with('success', 'Account created successfully! Please login.');
    }
}
