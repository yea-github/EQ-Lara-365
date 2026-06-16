<?php

namespace Tests\Unit;

use App\Application\Employee\GetAllEmployeesAction;
use App\Domain\Employee\Repositories\EmployeeRepositoryInterface;
use App\Models\Employee;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class GetAllEmployeesActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_all_employees_as_json_ready_arrays(): void
    {
        $employee = new Employee([
            'first_name' => 'Gillian',
            'last_name' => 'Anderson',
            'date_of_birth' => '1985-01-07',
            'birth_place' => 'Frankfurt',
            'salary_per_month' => 5000,
            'start_date' => '2015-03-23',
            'department' => 'Software Developer',
            'skills' => 'PHP, Angular, ReactJS, JavaScript, TypeScript',
            'remark' => 'Working for Accounting Software',
        ]);
        $employee->Id = 1;

        $repository = Mockery::mock(EmployeeRepositoryInterface::class);
        $repository
            ->shouldReceive('all')
            ->once()
            ->andReturn(collect([$employee]));

        $action = new GetAllEmployeesAction($repository);

        $this->assertSame([
            [
                'Id' => 1,
                'first_name' => 'Gillian',
                'last_name' => 'Anderson',
                'date_of_birth' => '07.01.1985',
                'birth_place' => 'Frankfurt',
                'salary_per_month' => '5000.00',
                'start_date' => '23.03.2015',
                'department' => 'Software Developer',
                'skills' => 'PHP, Angular, ReactJS, JavaScript, TypeScript',
                'remark' => 'Working for Accounting Software',
            ],
        ], $action->execute());
    }
}
