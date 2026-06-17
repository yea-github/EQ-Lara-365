<?php

namespace Tests\Feature;

use App\Application\HrOverview\GetHrOverviewAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class HrOverviewApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_get_hr_overview_requires_authentication(): void
    {
        $this->getJson('/api/get-hr-overview')
            ->assertUnauthorized();
    }

    public function test_authenticated_user_can_get_hr_overview(): void
    {
        $this->withoutMiddleware();

        $action = Mockery::mock(GetHrOverviewAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->andReturn([
                [
                    'Id' => 1,
                    'year' => 2020,
                    'month' => 'January',
                    'total_employees' => 356,
                    'new_joines' => 22,
                    'on_leave' => 18,
                    'open_positions' => 12,
                ],
            ]);

        $this->app->instance(GetHrOverviewAction::class, $action);

        $response = $this->getJson('/api/get-hr-overview');

        $response
            ->assertOk()
            ->assertExactJson([
                [
                    'Id' => 1,
                    'year' => 2020,
                    'month' => 'January',
                    'total_employees' => 356,
                    'new_joines' => 22,
                    'on_leave' => 18,
                    'open_positions' => 12,
                ],
            ]);
    }
}
