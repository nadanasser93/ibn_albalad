<?php

namespace App\Providers;


use App\Services\Customer\CustomerService;
use App\Services\Customer\ICustomerService;
use App\Services\Period\IPeriodService;
use App\Services\Period\PeriodService;
use App\Services\Subscription\ISubscriptionService;
use App\Services\Subscription\SubScriptionService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        //customer
        $this->app->bind(
            ICustomerService::class,
            CustomerService::class
        );
        $this->app->bind(
            IPeriodService::class,
            PeriodService::class
        );
        $this->app->bind(
            ISubscriptionService::class,
            SubScriptionService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
