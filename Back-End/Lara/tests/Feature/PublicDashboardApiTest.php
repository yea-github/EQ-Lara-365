<?php

namespace Tests\Feature;

use App\Application\Customer\GetCustomersBySalesAction;
use App\Application\DailySummery\GetDailySummeryAction;
use App\Application\HrOverview\GetHrOverviewAction;
use App\Application\InventorySummery\GetInventorySummeryAction;
use App\Application\ProjectOverview\GetProjectOverviewAction;
use App\Application\Sales\GetSalesByCategoryAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class PublicDashboardApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_public_get_customer_by_sales_does_not_require_authentication(): void
    {
        $payload = [
            ['Id' => 1, 'customer_name' => 'Stark Industries', 'sales' => '250000.00', 'orders' => 87],
        ];

        $action = Mockery::mock(GetCustomersBySalesAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);
        $this->app->instance(GetCustomersBySalesAction::class, $action);

        $this->getJson('/api/pub/get-customer-by-sales')
            ->assertOk()
            ->assertExactJson($payload);
    }

    public function test_public_get_daily_summery_does_not_require_authentication(): void
    {
        $payload = [
            ['Id' => 1, 'year' => 2020, 'month' => 'January', 'total_revenue' => 18607500, 'total_sales_orders' => 875, 'total_purchase_orders' => 433, 'total_inventory_value' => 7433500, 'total_outstanding' => 3209000],
        ];

        $action = Mockery::mock(GetDailySummeryAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);
        $this->app->instance(GetDailySummeryAction::class, $action);

        $this->getJson('/api/pub/get-daily-summery')
            ->assertOk()
            ->assertExactJson($payload);
    }

    public function test_public_get_hr_overview_does_not_require_authentication(): void
    {
        $payload = [
            ['Id' => 1, 'year' => 2020, 'month' => 'January', 'total_employees' => 356, 'new_joines' => 22, 'on_leave' => 18, 'open_positions' => 12],
        ];

        $action = Mockery::mock(GetHrOverviewAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);
        $this->app->instance(GetHrOverviewAction::class, $action);

        $this->getJson('/api/pub/get-hr-overview')
            ->assertOk()
            ->assertExactJson($payload);
    }

    public function test_public_get_inventory_summery_does_not_require_authentication(): void
    {
        $payload = [
            ['Id' => 1, 'year' => 2020, 'month' => 'January', 'item_categorie' => 'Electronics', 'items' => 120, 'qty_in_hand' => 15250, 'value' => 6240000],
        ];

        $action = Mockery::mock(GetInventorySummeryAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);
        $this->app->instance(GetInventorySummeryAction::class, $action);

        $this->getJson('/api/pub/get-inventory-summery')
            ->assertOk()
            ->assertExactJson($payload);
    }

    public function test_public_get_project_overview_does_not_require_authentication(): void
    {
        $payload = [
            ['Id' => 1, 'year' => 2020, 'month' => 'January', 'in_progress' => 8, 'completed' => 6, 'on_hold' => 3, 'not_started' => 11],
        ];

        $action = Mockery::mock(GetProjectOverviewAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);
        $this->app->instance(GetProjectOverviewAction::class, $action);

        $this->getJson('/api/pub/get-project-overview')
            ->assertOk()
            ->assertExactJson($payload);
    }

    public function test_public_sales_by_category_does_not_require_authentication(): void
    {
        $payload = [
            ['Id' => 1, 'year' => 2020, 'month' => 'January', 'category_name' => 'Electronics', 'sales_by_percentage' => 38, 'total_sales_price' => 5678345],
        ];

        $action = Mockery::mock(GetSalesByCategoryAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);
        $this->app->instance(GetSalesByCategoryAction::class, $action);

        $this->getJson('/api/pub/sales-by-category')
            ->assertOk()
            ->assertExactJson($payload);
    }
}
