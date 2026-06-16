<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Employee\Repositories\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Support\Collection;

class EloquentEmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * @return Collection<int, Employee>
     */
    public function all(): Collection
    {
        return Employee::query()
            ->orderBy('Id')
            ->get();
    }
}
