<?php

namespace Tests\Unit;

use App\Application\ProjectOverview\GetProjectOverviewAction;
use App\Domain\ProjectOverview\Repositories\ProjectOverviewRepositoryInterface;
use App\Models\ProjectOverview;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class GetProjectOverviewActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_project_overview_as_json_ready_arrays(): void
    {
        $projectOverview = new ProjectOverview([
            'year' => 2020,
            'month' => 'January',
            'in_progress' => 8,
            'completed' => 6,
            'on_hold' => 3,
            'not_started' => 11,
        ]);
        $projectOverview->Id = 1;

        $repository = Mockery::mock(ProjectOverviewRepositoryInterface::class);
        $repository
            ->shouldReceive('all')
            ->once()
            ->andReturn(collect([$projectOverview]));

        $action = new GetProjectOverviewAction($repository);

        $this->assertSame([
            [
                'Id' => 1,
                'year' => 2020,
                'month' => 'January',
                'in_progress' => 8,
                'completed' => 6,
                'on_hold' => 3,
                'not_started' => 11,
            ],
        ], $action->execute());
    }
}
