<?php

namespace Tests\Unit;

use App\Application\DailySummery\GetDailySummeryAction;
use App\Domain\DailySummery\Repositories\DailySummeryRepositoryInterface;
use App\Models\DailySummery;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class GetDailySummeryActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_daily_summery_as_json_ready_arrays(): void
    {
        $dailySummery = new DailySummery([
            'year' => 2020,
            'month' => 'January',
            'total_revenue' => 18607500,
            'total_sales_orders' => 875,
            'total_purchase_orders' => 433,
            'total_inventory_value' => 7433500,
            'total_outstanding' => 3209000,
        ]);
        $dailySummery->Id = 1;

        $repository = Mockery::mock(DailySummeryRepositoryInterface::class);
        $repository
            ->shouldReceive('all')
            ->once()
            ->andReturn(collect([$dailySummery]));

        $action = new GetDailySummeryAction($repository);

        $this->assertSame([
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
        ], $action->execute());
    }
}
