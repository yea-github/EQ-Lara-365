<?php

namespace App\Domain\HrOverview\Repositories;

use Illuminate\Support\Collection;

interface HrOverviewRepositoryInterface
{
    /**
     * @return Collection<int, \App\Models\HrOverview>
     */
    public function all(): Collection;
}
