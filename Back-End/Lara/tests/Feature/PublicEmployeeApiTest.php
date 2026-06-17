<?php

namespace Tests\Feature;

use App\Application\Employee\GetAllEmployeesAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class PublicEmployeeApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_public_get_all_employees_does_not_require_authentication(): void
    {
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

        $response = $this->getJson('/api/pub/get-all-employees');

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
