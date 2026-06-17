<?php

namespace Tests\Unit;

use App\Application\InventorySummery\GetInventorySummeryAction;
use App\Domain\InventorySummery\Repositories\InventorySummeryRepositoryInterface;
use App\Models\InventorySummery;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class GetInventorySummeryActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_inventory_summery_as_json_ready_arrays(): void
    {
        $inventorySummery = new InventorySummery([
            'year' => 2020,
            'month' => 'January',
            'item_categorie' => 'Electronics',
            'items' => 120,
            'qty_in_hand' => 15250,
            'value' => 6240000,
        ]);
        $inventorySummery->Id = 1;

        $repository = Mockery::mock(InventorySummeryRepositoryInterface::class);
        $repository
            ->shouldReceive('all')
            ->once()
            ->andReturn(collect([$inventorySummery]));

        $action = new GetInventorySummeryAction($repository);

        $this->assertSame([
            [
                'Id' => 1,
                'year' => 2020,
                'month' => 'January',
                'item_categorie' => 'Electronics',
                'items' => 120,
                'qty_in_hand' => 15250,
                'value' => 6240000,
            ],
        ], $action->execute());
    }
}
