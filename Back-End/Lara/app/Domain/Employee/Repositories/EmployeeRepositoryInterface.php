<?php

namespace App\Domain\Employee\Repositories;

use Illuminate\Support\Collection;

interface EmployeeRepositoryInterface
{
    /**
     * @return Collection<int, \App\Models\Employee>
     */
    public function all(): Collection;
}
