<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class EloquentUserRepository implements UserRepositoryInterface
{
    /**
     * @return Collection<int, User>
     */
    public function all(): Collection
    {
        return User::query()
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->get();
    }

    public function create(array $attributes): User
    {
        return User::query()->create($attributes);
    }
}
