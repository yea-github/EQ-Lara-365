<?php

namespace App\Application\Auth\Concerns;

use App\Models\User;

trait FormatsJwtResponse
{
    /**
     * @return array{access_token: string, token_type: string, expires_in: int, user: array<string, mixed>}
     */
    private function tokenResponse(string $token, User $user): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => $this->userResponse($user),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function userResponse(User $user): array
    {
        return [
            'Id' => $user->Id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'user_name' => $user->user_name,
            'privilege' => $user->privilege,
        ];
    }
}
