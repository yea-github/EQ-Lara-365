<?php

namespace App\Domain\DailySummery\Repositories;

use Illuminate\Support\Collection;

interface DailySummeryRepositoryInterface
{
    /**
     * @return Collection<int, \App\Models\DailySummery>
     */
    public function all(): Collection;
}
