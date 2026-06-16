<?php

namespace App\Application\Customer;

use App\Domain\Customer\Repositories\CustomerRepositoryInterface;
use App\Models\Customer;

class GetCustomersBySalesAction
{
    public function __construct(
        private readonly CustomerRepositoryInterface $customers
    ) {}

    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(): array
    {
        return $this->customers
            ->allBySales()
            ->map(fn (Customer $customer): array => $this->customerResponse($customer))
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function customerResponse(Customer $customer): array
    {
        return [
            'Id' => $customer->Id,
            'customer_name' => $customer->customer_name,
            'sales' => $customer->sales,
            'orders' => $customer->orders,
        ];
    }
}
