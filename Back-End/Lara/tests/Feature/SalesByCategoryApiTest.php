<?php

namespace Tests\Feature;

use App\Application\Sales\GetSalesByCategoryAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class SalesByCategoryApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_sales_by_category_requires_authentication(): void
    {
        $this->getJson('/api/sales-by-category')
            ->assertUnauthorized();
    }

    public function test_authenticated_user_can_get_sales_by_category(): void
    {
        $this->withoutMiddleware();

        $action = Mockery::mock(GetSalesByCategoryAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->andReturn([
                [
                    'Id' => 1,
                    'year' => 2020,
                    'month' => 'January',
                    'category_name' => 'Electronics',
                    'sales_by_percentage' => 38,
                    'total_sales_price' => 5678345,
                ],
            ]);

        $this->app->instance(GetSalesByCategoryAction::class, $action);

        $response = $this->getJson('/api/sales-by-category');

        $response
            ->assertOk()
            ->assertExactJson([
                [
                    'Id' => 1,
                    'year' => 2020,
                    'month' => 'January',
                    'category_name' => 'Electronics',
                    'sales_by_percentage' => 38,
                    'total_sales_price' => 5678345,
                ],
            ]);
    }
}
