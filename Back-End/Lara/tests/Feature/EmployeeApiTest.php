<?php

namespace Tests\Feature;

use App\Application\Employee\GetAllEmployeesAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class EmployeeApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_get_all_employees_requires_authentication(): void
    {
        $this->getJson('/api/get-all-employees')
            ->assertUnauthorized();
    }

    public function test_authenticated_user_can_get_all_employees(): void
    {
        $this->withoutMiddleware();

        $action = Mockery::mock(GetAllEmployeesAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->andReturn([
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
            ]);

        $this->app->instance(GetAllEmployeesAction::class, $action);

        $response = $this->getJson('/api/get-all-employees');

        $response
            ->assertOk()
            ->assertExactJson([
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
            ]);
    }
}
