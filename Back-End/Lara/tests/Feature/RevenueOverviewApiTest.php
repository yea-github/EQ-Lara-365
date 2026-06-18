<?php

namespace Tests\Feature;

use App\Application\RevenueOverview\GetRevenueOverviewAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class RevenueOverviewApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_get_revenue_overview_requires_authentication(): void
    {
        $this->getJson('/api/get-revenue-overview')
            ->assertUnauthorized();
    }

    public function test_authenticated_user_can_get_revenue_overview(): void
    {
        $this->withoutMiddleware();

        $payload = [
            ['Id' => 1, 'Year' => 2020, 'Month' => 'January', 'Revenue' => 1.0, 'Expenses' => 0.5],
        ];

        $action = Mockery::mock(GetRevenueOverviewAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);
        $this->app->instance(GetRevenueOverviewAction::class, $action);

        $this->getJson('/api/get-revenue-overview')
            ->assertOk()
            ->assertExactJson($payload);
    }

    public function test_public_get_revenue_overview_does_not_require_authentication(): void
    {
        $payload = [
            ['Id' => 1, 'Year' => 2020, 'Month' => 'January', 'Revenue' => 1.0, 'Expenses' => 0.5],
        ];

        $action = Mockery::mock(GetRevenueOverviewAction::class);
        $action->shouldReceive('execute')->once()->andReturn($payload);
        $this->app->instance(GetRevenueOverviewAction::class, $action);

        $this->getJson('/api/pub/get-revenue-overview')
            ->assertOk()
            ->assertExactJson($payload);
    }
}
