<?php

namespace App\Application\Auth;

use App\Application\Auth\Concerns\FormatsJwtResponse;
use App\Domain\Auth\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class RegisterAction
{
    use FormatsJwtResponse;

    public function __construct(
        private readonly UserRepositoryInterface $users
    ) {}

    /**
     * @param  array{first_name: string, last_name: string, username: string, password: string, privilege?: string}  $data
     * @return array{access_token: string, token_type: string, expires_in: int, user: array<string, mixed>}
     */
    public function execute(array $data): array
    {
        $user = $this->users->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_name' => $data['username'],
            'privilege' => $data['privilege'] ?? 'user',
            'password' => Hash::make($data['password']),
        ]);

        $token = auth('api')->login($user);

        return $this->tokenResponse($token, $user);
    }
}
