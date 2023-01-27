<?php

namespace App\Providers;

use App\Events\Create\CreatingReading;
use App\Events\Create\CreatingTeaching;
use App\Events\Update\UpdatingReading;
// CreatingEvents
use App\Events\Update\UpdatingTeaching;
use App\Listeners\Create\CreateReading;
// UpdatingEvents
use App\Listeners\Create\CreateTeaching;
use App\Listeners\Update\UpdateReading;
// CreatingListeners
use App\Listeners\Update\UpdateTeaching;
use Illuminate\Auth\Events\Registered;
// UpdatingEvents
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
