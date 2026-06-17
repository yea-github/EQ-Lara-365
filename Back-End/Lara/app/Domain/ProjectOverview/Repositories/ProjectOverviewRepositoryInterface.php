<?php

namespace App\Domain\ProjectOverview\Repositories;

use Illuminate\Support\Collection;

interface ProjectOverviewRepositoryInterface
{
    /**
     * @return Collection<int, \App\Models\ProjectOverview>
     */
    public function all(): Collection;
}
