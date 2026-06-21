<?php

namespace Tests\Unit;

use App\Application\Customer\GetCustomersBySalesAction;
use App\Application\DailySummery\GetDailySummeryAction;
use App\Application\HrOverview\GetHrOverviewAction;
use App\Application\InventorySummery\GetInventorySummeryAction;
use App\Application\ProjectOverview\GetProjectOverviewAction;
use App\Application\Sales\GetSalesByCategoryAction;
use App\Application\UsersRoles\GetAllUsersRolesAction;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DailySummeryController;
use App\Http\Controllers\Api\HrOverviewController;
use App\Http\Controllers\Api\InventorySummeryController;
use App\Http\Controllers\Api\ProjectOverviewController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\UsersRolesController;
use Illuminate\Http\JsonResponse;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class PublicDashboardControllerTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_public_customer_by_sales_returns_same_payload_as_action(): void
    {
        $payload = [
            ['Id' => 1, 'customer_name' => 'Stark Industries', 'sales' => '250000.00', 'orders' => 87],
        ];
        $action = Mockery::mock(GetCustomersBySalesAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);

        $this->assertJsonResponse($payload, (new CustomerController())->getCustomerBySales($action));
    }

    public function test_public_daily_summery_returns_same_payload_as_action(): void
    {
        $payload = [
            ['Id' => 1, 'year' => 2020, 'month' => 'January', 'total_revenue' => 18607500, 'total_sales_orders' => 875, 'total_purchase_orders' => 433, 'total_inventory_value' => 7433500, 'total_outstanding' => 3209000],
        ];
        $action = Mockery::mock(GetDailySummeryAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);

        $this->assertJsonResponse($payload, (new DailySummeryController())->getDailySummery($action));
    }

    public function test_public_hr_overview_returns_same_payload_as_action(): void
    {
        $payload = [
            ['Id' => 1, 'year' => 2020, 'month' => 'January', 'total_employees' => 356, 'new_joines' => 22, 'on_leave' => 18, 'open_positions' => 12],
        ];
        $action = Mockery::mock(GetHrOverviewAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);

        $this->assertJsonResponse($payload, (new HrOverviewController())->getHrOverview($action));
    }

    public function test_public_inventory_summery_returns_same_payload_as_action(): void
    {
        $payload = [
            ['Id' => 1, 'year' => 2020, 'month' => 'January', 'item_categorie' => 'Electronics', 'items' => 120, 'qty_in_hand' => 15250, 'value' => 6240000],
        ];
        $action = Mockery::mock(GetInventorySummeryAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);

        $this->assertJsonResponse($payload, (new InventorySummeryController())->getInventorySummery($action));
    }

    public function test_public_project_overview_returns_same_payload_as_action(): void
    {
        $payload = [
            ['Id' => 1, 'year' => 2020, 'month' => 'January', 'in_progress' => 8, 'completed' => 6, 'on_hold' => 3, 'not_started' => 11],
        ];
        $action = Mockery::mock(GetProjectOverviewAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);

        $this->assertJsonResponse($payload, (new ProjectOverviewController())->getProjectOverview($action));
    }

    public function test_public_sales_by_category_returns_same_payload_as_action(): void
    {
        $payload = [
            ['Id' => 1, 'year' => 2020, 'month' => 'January', 'category_name' => 'Electronics', 'sales_by_percentage' => 38, 'total_sales_price' => 5678345],
        ];
        $action = Mockery::mock(GetSalesByCategoryAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);

        $this->assertJsonResponse($payload, (new SalesController())->salesByCategory($action));
    }

    public function test_public_users_roles_returns_same_payload_as_action(): void
    {
        $payload = [
            ['Id' => 1, 'first_name' => 'Ada', 'last_name' => 'Lovelace', 'user_name' => 'ada-124', 'roles' => 'Super Admin'],
        ];
        $action = Mockery::mock(GetAllUsersRolesAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);

        $this->assertJsonResponse($payload, (new UsersRolesController())->getAllUsersRoles($action));
    }

    /**
     * @param array<int, array<string, mixed>> $payload
     */
    private function assertJsonResponse(array $payload, JsonResponse $response): void
    {
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame($payload, $response->getData(true));
    }
}
