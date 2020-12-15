<?php

namespace App\Providers;

use App\Repositories\BankRepository;
use App\Repositories\CurrenciesRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot():void
    {
        $this->app->bind(CurrenciesRepository::class, BankRepository::class);
    }
}
