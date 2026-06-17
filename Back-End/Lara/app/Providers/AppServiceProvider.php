<?php

namespace App\Providers;

use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Domain\Customer\Repositories\CustomerRepositoryInterface;
use App\Domain\DailySummery\Repositories\DailySummeryRepositoryInterface;
use App\Domain\Employee\Repositories\EmployeeRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\EloquentCustomerRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentDailySummeryRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentEmployeeRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EloquentEmployeeRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, EloquentCustomerRepository::class);
        $this->app->bind(DailySummeryRepositoryInterface::class, EloquentDailySummeryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
