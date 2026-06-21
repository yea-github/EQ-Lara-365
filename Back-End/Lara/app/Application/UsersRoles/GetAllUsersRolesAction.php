<?php

namespace App\Application\UsersRoles;

use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Models\User;

class GetAllUsersRolesAction
{
    public function __construct(
        private readonly UserRepositoryInterface $users
    ) {}

    /**
     * @return array<int, array<string, mixed>>
     */
    public function execute(): array
    {
        return $this->users
            ->all()
            ->map(fn (User $user): array => $this->userRolesResponse($user))
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function userRolesResponse(User $user): array
    {
        return [
            'Id' => $user->Id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'user_name' => $user->user_name,
            'roles' => $user->roles,
        ];
    }
}
