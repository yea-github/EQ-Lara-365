<?php

namespace App\Domain\Auth\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * @param  array{first_name: string, last_name: string, user_name: string, privilege: string, password: string}  $attributes
     */
    public function create(array $attributes): User;
}
