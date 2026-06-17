<?php

namespace Tests\Unit;

use App\Application\Employee\GetAllEmployeesAction;
use App\Http\Controllers\Api\EmployeeController;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class PublicGetAllEmployeesControllerTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_the_same_employee_payload_as_the_get_all_employees_action(): void
    {
        $payload = [
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
        ];

        $action = Mockery::mock(GetAllEmployeesAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->andReturn($payload);

        $response = (new EmployeeController())->getAllEmployees($action);

        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame($payload, $response->getData(true));
    }
}
