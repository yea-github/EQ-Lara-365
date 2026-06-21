<?php

namespace Tests\Unit;

use App\Application\UsersRoles\GetAllUsersRolesAction;
use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class GetAllUsersRolesActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_users_roles_payload(): void
    {
        $user = new User([
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'user_name' => 'ada-124',
            'roles' => 'Super Admin',
        ]);
        $user->Id = 1;

        $repository = Mockery::mock(UserRepositoryInterface::class);
        $repository
            ->shouldReceive('all')
            ->once()
            ->andReturn(new Collection([$user]));

        $action = new GetAllUsersRolesAction($repository);

        $this->assertSame([
            [
                'Id' => 1,
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'user_name' => 'ada-124',
                'roles' => 'Super Admin',
            ],
        ], $action->execute());
    }
}
