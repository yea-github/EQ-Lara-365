<?php

namespace Tests\Unit;

use App\Application\Auth\RegisterAction;
use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class RegisterActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_creates_a_user_with_hashed_password_and_default_roles(): void
    {
        $user = new User([
            'first_name' => 'Dorothy',
            'last_name' => 'Vaughan',
            'user_name' => 'dorothy_vaughan',
            'roles' => 'User',
            'password' => Hash::make('password123'),
        ]);
        $user->Id = 42;

        $repository = Mockery::mock(UserRepositoryInterface::class);
        $repository
            ->shouldReceive('create')
            ->once()
            ->with(Mockery::on(function (array $attributes): bool {
                return $attributes['first_name'] === 'Dorothy'
                    && $attributes['last_name'] === 'Vaughan'
                    && $attributes['user_name'] === 'dorothy_vaughan'
                    && $attributes['roles'] === 'User'
                    && Hash::check('password123', $attributes['password']);
            }))
            ->andReturn($user);

        $this->app->instance(UserRepositoryInterface::class, $repository);

        $response = app(RegisterAction::class)->execute([
            'first_name' => 'Dorothy',
            'last_name' => 'Vaughan',
            'username' => 'dorothy_vaughan',
            'password' => 'password123',
        ]);

        $this->assertArrayHasKey('access_token', $response);
        $this->assertSame('Bearer', $response['token_type']);
        $this->assertSame('dorothy_vaughan', $response['user']['user_name']);
        $this->assertSame('User', $response['user']['roles']);
    }
}
