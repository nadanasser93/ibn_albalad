<?php

namespace App\Providers;


use App\Services\Company\CompanyService;
use App\Services\Company\ICompanyService;
use App\Services\Customer\CustomerService;
use App\Services\Customer\ICustomerService;
use App\Services\Employee\EmployeeService;
use App\Services\Employee\IEmployeeService;
use App\Services\Home\HomeService;
use App\Services\Home\IHomeService;
use App\Services\Payment\IPaymentService;
use App\Services\Payment\PaymentService;
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
            IPaymentService::class,
            PaymentService::class
        );
        $this->app->bind(
            IEmployeeService::class,
            EmployeeService::class
        );
        $this->app->bind(
            ICompanyService::class,
            CompanyService::class
        );
        $this->app->bind(
            IPeriodService::class,
            PeriodService::class
        );
        $this->app->bind(
            ISubscriptionService::class,
            SubScriptionService::class
        );
        $this->app->bind(
            IHomeService::class,
            HomeService::class
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
