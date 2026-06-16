<?php

namespace App\Domain\Customer\Repositories;

use Illuminate\Support\Collection;

interface CustomerRepositoryInterface
{
    /**
     * @return Collection<int, \App\Models\Customer>
     */
    public function allBySales(): Collection;
}
