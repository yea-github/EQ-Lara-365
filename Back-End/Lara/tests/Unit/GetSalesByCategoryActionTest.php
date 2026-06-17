<?php

namespace Tests\Unit;

use App\Application\Sales\GetSalesByCategoryAction;
use App\Domain\Sales\Repositories\SalesRepositoryInterface;
use App\Models\Sale;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class GetSalesByCategoryActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_sales_by_category_as_json_ready_arrays(): void
    {
        $sale = new Sale([
            'year' => 2020,
            'month' => 'January',
            'category_name' => 'Electronics',
            'sales_by_percentage' => 38,
            'total_sales_price' => 5678345,
        ]);
        $sale->Id = 1;

        $repository = Mockery::mock(SalesRepositoryInterface::class);
        $repository
            ->shouldReceive('allByCategory')
            ->once()
            ->andReturn(collect([$sale]));

        $action = new GetSalesByCategoryAction($repository);

        $this->assertSame([
            [
                'Id' => 1,
                'year' => 2020,
                'month' => 'January',
                'category_name' => 'Electronics',
                'sales_by_percentage' => 38,
                'total_sales_price' => 5678345,
            ],
        ], $action->execute());
    }
}
