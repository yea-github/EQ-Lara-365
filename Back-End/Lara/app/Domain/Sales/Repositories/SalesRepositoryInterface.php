<?php

namespace App\Domain\Sales\Repositories;

use Illuminate\Support\Collection;

interface SalesRepositoryInterface
{
    /**
     * @return Collection<int, \App\Models\Sale>
     */
    public function allByCategory(): Collection;
}
