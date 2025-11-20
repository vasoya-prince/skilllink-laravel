<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/login';

    public function boot(): void
    {
        $this->routes(function () {

            // Public web routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Protected routes
            Route::middleware(['web', 'auth'])
                ->group(function () {

                    // Admin routes
                    Route::middleware('admin')
                        ->prefix('admin')
                        ->group(base_path('routes/admin.php'));

                    // Worker routes
                    Route::middleware('worker')
                        ->prefix('worker')
                        ->group(base_path('routes/worker.php'));

                    // Customer routes
                    Route::middleware('customer')
                        ->prefix('customer')
                        ->group(base_path('routes/customer.php'));
                });

            // API routes
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
