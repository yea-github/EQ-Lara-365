<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Customer\Repositories\CustomerRepositoryInterface;
use App\Models\Customer;
use Illuminate\Support\Collection;

class EloquentCustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @return Collection<int, Customer>
     */
    public function allBySales(): Collection
    {
        return Customer::query()
            ->orderByDesc('sales')
            ->orderBy('Id')
            ->get();
    }
}
