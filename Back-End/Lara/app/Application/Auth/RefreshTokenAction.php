<?php

namespace App\Application\Auth;

use App\Application\Auth\Concerns\FormatsJwtResponse;

class RefreshTokenAction
{
    use FormatsJwtResponse;

    /**
     * @return array{access_token: string, token_type: string, expires_in: int, user: array<string, mixed>}
     */
    public function execute(): array
    {
        $user = auth('api')->user();
        $token = auth('api')->refresh();

        return $this->tokenResponse($token, $user);
    }
}
