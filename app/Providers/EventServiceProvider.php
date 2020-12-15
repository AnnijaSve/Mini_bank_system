<?php

namespace App\Providers;

use App\Events\AddedNewCommentEvent;
use App\Events\NewTransaction;
use App\Events\UserLogin;
use App\Listeners\AddedNewCommentListener;
use App\Listeners\SECONDAddedNewCommentListener;
use App\Listeners\SenderTransactionListener;
use App\Listeners\UserLoginListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserLogin::class => [
            UserLoginListener::class,
        ],
        NewTransaction::class => [
            SenderTransactionListener::class,
        ]
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
