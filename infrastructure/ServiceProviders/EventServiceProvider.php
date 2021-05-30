<?php
declare(strict_types=1);

namespace Infrastructure\ServiceProviders;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * These listeners have to be specified since Laravel 8 does not support auto-discover listener with union types
     */
    protected $listen = [

    ];

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }

    /**
     * Get the listener directories that should be used to discover events.
     *
     * @return array
     */
    protected function discoverEventsWithin()
    {
        return [
            base_path('application/Listeners'),
        ];
    }
}
