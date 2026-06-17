<?php

namespace Tests\Unit;

use App\Application\HrOverview\GetHrOverviewAction;
use App\Domain\HrOverview\Repositories\HrOverviewRepositoryInterface;
use App\Models\HrOverview;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class GetHrOverviewActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_hr_overview_as_json_ready_arrays(): void
    {
        $hrOverview = new HrOverview([
            'year' => 2020,
            'month' => 'January',
            'total_employees' => 356,
            'new_joines' => 22,
            'on_leave' => 18,
            'open_positions' => 12,
        ]);
        $hrOverview->Id = 1;

        $repository = Mockery::mock(HrOverviewRepositoryInterface::class);
        $repository
            ->shouldReceive('all')
            ->once()
            ->andReturn(collect([$hrOverview]));

        $action = new GetHrOverviewAction($repository);

        $this->assertSame([
            [
                'Id' => 1,
                'year' => 2020,
                'month' => 'January',
                'total_employees' => 356,
                'new_joines' => 22,
                'on_leave' => 18,
                'open_positions' => 12,
            ],
        ], $action->execute());
    }
}
