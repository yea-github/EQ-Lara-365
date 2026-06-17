<?php

namespace App\Domain\InventorySummery\Repositories;

use Illuminate\Support\Collection;

interface InventorySummeryRepositoryInterface
{
    /**
     * @return Collection<int, \App\Models\InventorySummery>
     */
    public function all(): Collection;
}
