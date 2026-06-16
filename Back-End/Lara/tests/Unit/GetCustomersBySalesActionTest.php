<?php

namespace Tests\Unit;

use App\Application\Customer\GetCustomersBySalesAction;
use App\Domain\Customer\Repositories\CustomerRepositoryInterface;
use App\Models\Customer;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class GetCustomersBySalesActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_customers_as_json_ready_arrays(): void
    {
        $firstCustomer = new Customer([
            'customer_name' => 'Stark Industries',
            'sales' => 250000,
            'orders' => 87,
        ]);
        $firstCustomer->Id = 1;

        $secondCustomer = new Customer([
            'customer_name' => 'Wayne Enterprises',
            'sales' => 211300.40,
            'orders' => 73,
        ]);
        $secondCustomer->Id = 2;

        $repository = Mockery::mock(CustomerRepositoryInterface::class);
        $repository
            ->shouldReceive('allBySales')
            ->once()
            ->andReturn(collect([$firstCustomer, $secondCustomer]));

        $action = new GetCustomersBySalesAction($repository);

        $this->assertSame([
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
        ], $action->execute());
    }
}
