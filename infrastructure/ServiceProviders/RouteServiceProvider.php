<?php
declare(strict_types=1);

namespace Infrastructure\ServiceProviders;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiV1Routes();
    }

    /**
     * Define the Web routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiV1Routes(): void
    {
        Route::prefix('v1')
            ->group(base_path('presentation/Http/Routes/api-v1.php'));
    }
}
