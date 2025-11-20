<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * @var string
     */
    public const HOME = '/login';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->routes(function () {

            // Admin Routes
            Route::middleware(['web', 'auth', 'admin'])
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));

            // Worker Routes
            Route::middleware(['web', 'auth', 'worker'])
                ->prefix('worker')
                ->group(base_path('routes/worker.php'));

            // Customer Routes
            Route::middleware(['web', 'auth', 'customer'])
                ->prefix('customer')
                ->group(base_path('routes/customer.php'));

            // Normal Web Routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // API Routes
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
