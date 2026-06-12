<?php

namespace App\Application\Auth;

use App\Application\Auth\Concerns\FormatsJwtResponse;
use Illuminate\Validation\ValidationException;

class LoginAction
{
    use FormatsJwtResponse;

    /**
     * @return array{access_token: string, token_type: string, expires_in: int, user: array<string, mixed>}
     */
    public function execute(string $username, string $password): array
    {
        $token = auth('api')->attempt([
            'user_name' => $username,
            'password' => $password,
        ]);

        if (! $token) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $this->tokenResponse($token, auth('api')->user());
    }
}
