<?php

namespace App\Application\Auth;

use App\Application\Auth\Concerns\FormatsJwtResponse;

class MeAction
{
    use FormatsJwtResponse;

    /**
     * @return array<string, mixed>
     */
    public function execute(): array
    {
        return $this->userResponse(auth('api')->user());
    }
}
