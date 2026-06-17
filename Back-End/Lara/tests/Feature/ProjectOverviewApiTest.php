<?php

namespace Tests\Feature;

use App\Application\ProjectOverview\GetProjectOverviewAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class ProjectOverviewApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_get_project_overview_requires_authentication(): void
    {
        $this->getJson('/api/get-project-overview')
            ->assertUnauthorized();
    }

    public function test_authenticated_user_can_get_project_overview(): void
    {
        $this->withoutMiddleware();

        $action = Mockery::mock(GetProjectOverviewAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->andReturn([
                [
                    'Id' => 1,
                    'year' => 2020,
                    'month' => 'January',
                    'in_progress' => 8,
                    'completed' => 6,
                    'on_hold' => 3,
                    'not_started' => 11,
                ],
            ]);

        $this->app->instance(GetProjectOverviewAction::class, $action);

        $response = $this->getJson('/api/get-project-overview');

        $response
            ->assertOk()
            ->assertExactJson([
                [
                    'Id' => 1,
                    'year' => 2020,
                    'month' => 'January',
                    'in_progress' => 8,
                    'completed' => 6,
                    'on_hold' => 3,
                    'not_started' => 11,
                ],
            ]);
    }
}
