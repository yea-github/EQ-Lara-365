<?php

namespace App\Domain\Auth\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    /**
     * @return Collection<int, User>
     */
    public function all(): Collection;

    /**
     * @param  array{first_name: string, last_name: string, user_name: string, roles: string, password: string}  $attributes
     */
    public function create(array $attributes): User;
}
