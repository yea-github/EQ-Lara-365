<?php

namespace Tests\Feature;

use App\Application\DailySummery\GetDailySummeryAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class DailySummeryApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_get_daily_summery_requires_authentication(): void
    {
        $this->getJson('/api/get-daily-summery')
            ->assertUnauthorized();
    }

    public function test_authenticated_user_can_get_daily_summery(): void
    {
        $this->withoutMiddleware();

        $action = Mockery::mock(GetDailySummeryAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->andReturn([
                [
                    'Id' => 1,
                    'year' => 2020,
                    'month' => 'January',
                    'total_revenue' => 18607500,
                    'total_sales_orders' => 875,
                    'total_purchase_orders' => 433,
                    'total_inventory_value' => 7433500,
                    'total_outstanding' => 3209000,
                ],
            ]);

        $this->app->instance(GetDailySummeryAction::class, $action);

        $response = $this->getJson('/api/get-daily-summery');

        $response
            ->assertOk()
            ->assertExactJson([
                [
                    'Id' => 1,
                    'year' => 2020,
                    'month' => 'January',
                    'total_revenue' => 18607500,
                    'total_sales_orders' => 875,
                    'total_purchase_orders' => 433,
                    'total_inventory_value' => 7433500,
                    'total_outstanding' => 3209000,
                ],
            ]);
    }
}
