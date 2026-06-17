<?php

namespace Tests\Feature;

use App\Application\InventorySummery\GetInventorySummeryAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class InventorySummeryApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_get_inventory_summery_requires_authentication(): void
    {
        $this->getJson('/api/get-inventory-summery')
            ->assertUnauthorized();
    }

    public function test_authenticated_user_can_get_inventory_summery(): void
    {
        $this->withoutMiddleware();

        $action = Mockery::mock(GetInventorySummeryAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->andReturn([
                [
                    'Id' => 1,
                    'year' => 2020,
                    'month' => 'January',
                    'item_categorie' => 'Electronics',
                    'items' => 120,
                    'qty_in_hand' => 15250,
                    'value' => 6240000,
                ],
            ]);

        $this->app->instance(GetInventorySummeryAction::class, $action);

        $response = $this->getJson('/api/get-inventory-summery');

        $response
            ->assertOk()
            ->assertExactJson([
                [
                    'Id' => 1,
                    'year' => 2020,
                    'month' => 'January',
                    'item_categorie' => 'Electronics',
                    'items' => 120,
                    'qty_in_hand' => 15250,
                    'value' => 6240000,
                ],
            ]);
    }
}
