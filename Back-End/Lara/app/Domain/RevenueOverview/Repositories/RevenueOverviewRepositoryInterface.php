<?php

namespace App\Domain\RevenueOverview\Repositories;

use Illuminate\Support\Collection;

interface RevenueOverviewRepositoryInterface
{
    /**
     * @return Collection<int, \App\Models\RevenueOverview>
     */
    public function all(): Collection;
}
