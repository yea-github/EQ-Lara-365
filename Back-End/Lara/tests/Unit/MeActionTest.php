<?php

namespace Tests\Unit;

use App\Application\Auth\MeAction;
use App\Models\User;
use Tests\TestCase;

class MeActionTest extends TestCase
{
    public function test_it_returns_the_authenticated_user_payload(): void
    {
        $user = new User([
            'first_name' => 'Margaret',
            'last_name' => 'Hamilton',
            'user_name' => 'margaret_hamilton',
            'privilege' => 'admin',
        ]);
        $user->Id = 7;

        $this->actingAs($user, 'api');

        $this->assertSame([
            'Id' => 7,
            'first_name' => 'Margaret',
            'last_name' => 'Hamilton',
            'user_name' => 'margaret_hamilton',
            'privilege' => 'admin',
        ], app(MeAction::class)->execute());
    }
}
