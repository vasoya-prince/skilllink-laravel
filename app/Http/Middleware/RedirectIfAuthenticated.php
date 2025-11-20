<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (auth()->check()) {

            switch (auth()->user()->role) {
                case 'worker':
                    return redirect()->route('worker.dashboard');

                case 'customer':
                    return redirect()->route('customer.dashboard');

                case 'admin':
                    return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
