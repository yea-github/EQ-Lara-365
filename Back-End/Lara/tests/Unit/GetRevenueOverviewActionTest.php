<?php

namespace Tests\Unit;

use App\Application\RevenueOverview\GetRevenueOverviewAction;
use App\Domain\RevenueOverview\Repositories\RevenueOverviewRepositoryInterface;
use App\Models\RevenueOverview;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class GetRevenueOverviewActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_revenue_overview_as_json_ready_arrays(): void
    {
        $revenueOverview = new RevenueOverview([
            'Year' => 2020,
            'Month' => 'January',
            'Revenue' => 1,
            'Expenses' => 0.5,
        ]);
        $revenueOverview->Id = 1;

        $repository = Mockery::mock(RevenueOverviewRepositoryInterface::class);
        $repository
            ->shouldReceive('all')
            ->once()
            ->andReturn(collect([$revenueOverview]));

        $action = new GetRevenueOverviewAction($repository);

        $this->assertSame([
            [
                'Id' => 1,
                'Year' => 2020,
                'Month' => 'January',
                'Revenue' => 1.0,
                'Expenses' => 0.5,
            ],
        ], $action->execute());
    }
}
