<?php

namespace Tests\Feature;

use App\Application\Customer\GetCustomersBySalesAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class CustomerApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_get_customer_by_sales_requires_authentication(): void
    {
        $this->getJson('/api/get-customer-by-sales')
            ->assertUnauthorized();
    }

    public function test_authenticated_user_can_get_customers_by_sales(): void
    {
        $this->withoutMiddleware();

        $action = Mockery::mock(GetCustomersBySalesAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->andReturn([
                [
                    'Id' => 1,
                    'customer_name' => 'Stark Industries',
                    'sales' => '250000.00',
                    'orders' => 87,
                ],
                [
                    'Id' => 2,
                    'customer_name' => 'Wayne Enterprises',
                    'sales' => '211300.40',
                    'orders' => 73,
                ],
            ]);

        $this->app->instance(GetCustomersBySalesAction::class, $action);

        $response = $this->getJson('/api/get-customer-by-sales');

        $response
            ->assertOk()
            ->assertExactJson([
                [
                    'Id' => 1,
                    'customer_name' => 'Stark Industries',
                    'sales' => '250000.00',
                    'orders' => 87,
                ],
                [
                    'Id' => 2,
                    'customer_name' => 'Wayne Enterprises',
                    'sales' => '211300.40',
                    'orders' => 73,
                ],
            ]);
    }
}
