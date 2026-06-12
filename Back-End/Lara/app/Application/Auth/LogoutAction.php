<?php

namespace App\Application\Auth;

class LogoutAction
{
    /**
     * @return array{message: string}
     */
    public function execute(): array
    {
        auth('api')->logout();

        return ['message' => 'Successfully logged out.'];
    }
}
