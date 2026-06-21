<?php

namespace Tests\Feature;

use App\Application\UsersRoles\GetAllUsersRolesAction;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class UsersRolesApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_get_all_users_roles_requires_authentication(): void
    {
        $this->getJson('/api/get-all-users-roles')
            ->assertUnauthorized();
    }

    public function test_public_get_all_users_roles_does_not_require_authentication(): void
    {
        $this->mockAction();

        $this->getJson('/api/pub/get-all-users-roles')
            ->assertOk()
            ->assertExactJson($this->payload());
    }

    public function test_authenticated_user_can_get_all_users_roles(): void
    {
        $this->withoutMiddleware();
        $this->mockAction();

        $this->getJson('/api/get-all-users-roles')
            ->assertOk()
            ->assertExactJson($this->payload());
    }

    private function mockAction(): void
    {
        $action = Mockery::mock(GetAllUsersRolesAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->andReturn($this->payload());

        $this->app->instance(GetAllUsersRolesAction::class, $action);
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function payload(): array
    {
        return [
            [
                'Id' => 1,
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'user_name' => 'ada-124',
                'roles' => 'Super Admin',
            ],
        ];
    }
}
