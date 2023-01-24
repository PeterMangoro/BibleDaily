<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

// CreatingEvents
use App\Events\Create\{
    CreatingReading,
    CreatingTeaching,
};

// UpdatingEvents
use App\Events\Update\{
    UpdatingReading,
    UpdatingTeaching,
};

// CreatingListeners
use App\Listeners\Create\{
    CreateReading,
    CreateTeaching,
};

// UpdatingEvents
use App\Listeners\Update\{
    UpdateReading,
    UpdateTeaching,
};

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        //Creating
        CreatingReading::class => [
            CreateReading::class,
        ],

        CreatingTeaching::class => [
            CreateTeaching::class,
        ],

        //Updating
        UpdatingReading::class => [
            UpdateReading::class,
        ],

        UpdatingTeaching::class => [
            UpdateTeaching::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
