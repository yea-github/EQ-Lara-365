<?php

namespace Tests\Unit;

use App\Application\Auth\LoginAction;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;

class LoginActionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_it_returns_a_token_response_for_valid_credentials(): void
    {
        $user = new User([
            'first_name' => 'Mary',
            'last_name' => 'Jackson',
            'user_name' => 'mary_jackson',
            'privilege' => 'user',
        ]);
        $user->Id = 15;

        $jwtFactory = Mockery::mock();
        $jwtFactory->shouldReceive('getTTL')->once()->andReturn(60);

        $guard = Mockery::mock();
        $guard
            ->shouldReceive('attempt')
            ->once()
            ->with([
                'user_name' => 'mary_jackson',
                'password' => 'password123',
            ])
            ->andReturn('jwt-token');
        $guard->shouldReceive('user')->once()->andReturn($user);
        $guard->shouldReceive('factory')->once()->andReturn($jwtFactory);

        $auth = Mockery::mock();
        $auth->shouldReceive('guard')->with('api')->andReturn($guard);

        $this->app->instance('auth', $auth);

        $response = app(LoginAction::class)->execute('mary_jackson', 'password123');

        $this->assertSame('jwt-token', $response['access_token']);
        $this->assertSame('Bearer', $response['token_type']);
        $this->assertSame(3600, $response['expires_in']);
        $this->assertSame('mary_jackson', $response['user']['user_name']);
        $this->assertArrayNotHasKey('password', $response['user']);
    }

    public function test_it_throws_validation_exception_for_invalid_credentials(): void
    {
        $guard = Mockery::mock();
        $guard
            ->shouldReceive('attempt')
            ->once()
            ->with([
                'user_name' => 'bad_credentials_user',
                'password' => 'wrong-password',
            ])
            ->andReturnFalse();

        $auth = Mockery::mock();
        $auth->shouldReceive('guard')->with('api')->andReturn($guard);

        $this->app->instance('auth', $auth);

        $this->expectException(ValidationException::class);

        app(LoginAction::class)->execute('bad_credentials_user', 'wrong-password');
    }
}
