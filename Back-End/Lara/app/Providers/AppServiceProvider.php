<?php

namespace App\Providers;

use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Domain\Customer\Repositories\CustomerRepositoryInterface;
use App\Domain\DailySummery\Repositories\DailySummeryRepositoryInterface;
use App\Domain\Employee\Repositories\EmployeeRepositoryInterface;
use App\Domain\HrOverview\Repositories\HrOverviewRepositoryInterface;
use App\Domain\InventorySummery\Repositories\InventorySummeryRepositoryInterface;
use App\Domain\ProjectOverview\Repositories\ProjectOverviewRepositoryInterface;
use App\Domain\RevenueOverview\Repositories\RevenueOverviewRepositoryInterface;
use App\Domain\Sales\Repositories\SalesRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\EloquentCustomerRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentDailySummeryRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentEmployeeRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentHrOverviewRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentInventorySummeryRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentProjectOverviewRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentRevenueOverviewRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentSalesRepository;
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
        $this->app->bind(HrOverviewRepositoryInterface::class, EloquentHrOverviewRepository::class);
        $this->app->bind(InventorySummeryRepositoryInterface::class, EloquentInventorySummeryRepository::class);
        $this->app->bind(ProjectOverviewRepositoryInterface::class, EloquentProjectOverviewRepository::class);
        $this->app->bind(RevenueOverviewRepositoryInterface::class, EloquentRevenueOverviewRepository::class);
        $this->app->bind(SalesRepositoryInterface::class, EloquentSalesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
