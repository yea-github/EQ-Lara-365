<?php

namespace Tests\Feature;

use App\Application\Auth\LoginAction;
use App\Application\Auth\LogoutAction;
use App\Application\Auth\MeAction;
use App\Application\Auth\RefreshTokenAction;
use App\Application\Auth\RegisterAction;
use Illuminate\Validation\PresenceVerifierInterface;
use Illuminate\Validation\ValidationException;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_user_can_register_and_receive_a_jwt_token(): void
    {
        $this->fakeUniqueValidation();
        $this->mockAction(RegisterAction::class, 'execute', [
            [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'username' => 'ada_lovelace',
                'password' => 'secret123',
            ],
        ], $this->tokenResponse([
            'Id' => 1,
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'user_name' => 'ada_lovelace',
            'privilege' => 'user',
        ]));

        $response = $this->postJson('/api/register', [
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'username' => 'ada_lovelace',
            'password' => 'secret123',
        ]);

        $response
            ->assertCreated()
            ->assertJsonStructure($this->tokenResponseStructure())
            ->assertJsonPath('token_type', 'Bearer')
            ->assertJsonPath('expires_in', 3600)
            ->assertJsonPath('user.first_name', 'Ada')
            ->assertJsonPath('user.last_name', 'Lovelace')
            ->assertJsonPath('user.user_name', 'ada_lovelace')
            ->assertJsonPath('user.privilege', 'user');
    }

    public function test_register_requires_unique_username_and_valid_password(): void
    {
        $this->fakeUniqueValidation(existingRows: 1);

        $response = $this->postJson('/api/register', [
            'first_name' => 'Grace',
            'last_name' => 'Hopper',
            'username' => 'existing_user',
            'password' => 'short',
        ]);

        $response
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['username', 'password']);
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $this->mockAction(LoginAction::class, 'execute', [
            'alan_turing',
            'password123',
        ], $this->tokenResponse([
            'Id' => 2,
            'first_name' => 'Alan',
            'last_name' => 'Turing',
            'user_name' => 'alan_turing',
            'privilege' => 'user',
        ]));

        $response = $this->postJson('/api/login', [
            'username' => 'alan_turing',
            'password' => 'password123',
        ]);

        $response
            ->assertOk()
            ->assertJsonStructure($this->tokenResponseStructure())
            ->assertJsonPath('token_type', 'Bearer')
            ->assertJsonPath('user.user_name', 'alan_turing');
    }

    public function test_login_rejects_invalid_credentials(): void
    {
        $action = Mockery::mock(LoginAction::class);
        $action
            ->shouldReceive('execute')
            ->once()
            ->with('invalid_login_user', 'wrong-password')
            ->andThrow(ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]));

        $this->app->instance(LoginAction::class, $action);

        $response = $this->postJson('/api/login', [
            'username' => 'invalid_login_user',
            'password' => 'wrong-password',
        ]);

        $response
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['username']);
    }

    public function test_authenticated_user_can_view_profile(): void
    {
        $this->withoutMiddleware();
        $this->mockAction(MeAction::class, 'execute', [], [
            'Id' => 3,
            'first_name' => 'Katherine',
            'last_name' => 'Johnson',
            'user_name' => 'katherine_johnson',
            'privilege' => 'admin',
        ]);

        $response = $this->getJson('/api/me');

        $response
            ->assertOk()
            ->assertExactJson([
                'Id' => 3,
                'first_name' => 'Katherine',
                'last_name' => 'Johnson',
                'user_name' => 'katherine_johnson',
                'privilege' => 'admin',
            ]);
    }

    public function test_protected_routes_require_authentication(): void
    {
        $this->getJson('/api/me')->assertUnauthorized();
        $this->postJson('/api/logout')->assertUnauthorized();
        $this->postJson('/api/refresh')->assertUnauthorized();
    }

    public function test_authenticated_user_can_refresh_token(): void
    {
        $this->withoutMiddleware();
        $this->mockAction(RefreshTokenAction::class, 'execute', [], $this->tokenResponse([
            'Id' => 4,
            'first_name' => 'Refresh',
            'last_name' => 'User',
            'user_name' => 'refresh_user',
            'privilege' => 'user',
        ], 'refreshed-token'));

        $response = $this->postJson('/api/refresh');

        $response
            ->assertOk()
            ->assertJsonStructure($this->tokenResponseStructure())
            ->assertJsonPath('token_type', 'Bearer')
            ->assertJsonPath('user.user_name', 'refresh_user');
    }

    public function test_authenticated_user_can_logout(): void
    {
        $this->withoutMiddleware();
        $this->mockAction(LogoutAction::class, 'execute', [], [
            'message' => 'Successfully logged out.',
        ]);

        $response = $this->postJson('/api/logout');

        $response
            ->assertOk()
            ->assertExactJson(['message' => 'Successfully logged out.']);
    }

    /**
     * @return array<int|string, mixed>
     */
    private function tokenResponseStructure(): array
    {
        return [
            'access_token',
            'token_type',
            'expires_in',
            'user' => [
                'Id',
                'first_name',
                'last_name',
                'user_name',
                'privilege',
            ],
        ];
    }

    /**
     * @param  array<string, mixed>  $arguments
     */
    private function mockAction(string $class, string $method, array $arguments, mixed $response): void
    {
        $action = Mockery::mock($class);
        $action
            ->shouldReceive($method)
            ->once()
            ->with(...$arguments)
            ->andReturn($response);

        $this->app->instance($class, $action);
    }

    /**
     * @param  array<string, mixed>  $user
     * @return array<string, mixed>
     */
    private function tokenResponse(array $user, string $token = 'jwt-token'): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => 3600,
            'user' => $user,
        ];
    }

    private function fakeUniqueValidation(int $existingRows = 0): void
    {
        $this->app['validator']->setPresenceVerifier(
            new class($existingRows) implements PresenceVerifierInterface
            {
                public function __construct(private readonly int $existingRows) {}

                /**
                 * @param  array<string, mixed>  $extra
                 */
                public function getCount(
                    $collection,
                    $column,
                    $value,
                    $excludeId = null,
                    $idColumn = null,
                    array $extra = []
                ): int {
                    return $this->existingRows;
                }

                /**
                 * @param  array<string, mixed>  $extra
                 */
                public function getMultiCount($collection, $column, array $values, array $extra = []): int
                {
                    return $this->existingRows;
                }
            }
        );
    }
}
