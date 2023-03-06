<?php

namespace App\Providers;

use App\Models\Doctor;
use App\Models\Prevention;
use App\Models\Spread;
use App\Models\Vaccine;
use App\Observers\DoctorObserver;
use App\Observers\PreventionObserver;
use App\Observers\SpreadObserver;
use App\Observers\VaccineObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
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
}
