<?php

namespace App\Application\Employee;

use App\Domain\Employee\Repositories\EmployeeRepositoryInterface;
use App\Models\Employee;

class GetAllEmployeesAction
{
    public function __construct(
        private readonly EmployeeRepositoryInterface $employees
    ) {}

    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(): array
    {
        return $this->employees
            ->all()
            ->map(fn (Employee $employee): array => $this->employeeResponse($employee))
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function employeeResponse(Employee $employee): array
    {
        return [
            'Id' => $employee->Id,
            'first_name' => $employee->first_name,
            'last_name' => $employee->last_name,
            'date_of_birth' => $employee->date_of_birth?->format('d.m.Y'),
            'birth_place' => $employee->birth_place,
            'salary_per_month' => $employee->salary_per_month,
            'start_date' => $employee->start_date?->format('d.m.Y'),
            'department' => $employee->department,
            'skills' => $employee->skills,
            'remark' => $employee->remark,
        ];
    }
}
