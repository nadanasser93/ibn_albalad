<?php

namespace App\Providers;

use App\Models\WeddingStory;

use App\Services\Customer\CustomerService;

use App\Services\Customer\ICustomerService;
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
