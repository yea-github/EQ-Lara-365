<?php

namespace App\Http\Controllers\Api\Auth;

use App\Application\Auth\LoginAction;
use App\Application\Auth\LogoutAction;
use App\Application\Auth\MeAction;
use App\Application\Auth\RefreshTokenAction;
use App\Application\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(Request $request, LoginAction $login): JsonResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        return response()->json(
            $login->execute($credentials['username'], $credentials['password'])
        );
    }

    public function register(Request $request, RegisterAction $register): JsonResponse
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:User,user_name'],
            'password' => ['required', 'string', Password::min(6)],
            'privilege' => ['sometimes', 'string', 'max:255'],
        ]);

        return response()->json($register->execute($data), 201);
    }

    public function logout(LogoutAction $logout): JsonResponse
    {
        return response()->json($logout->execute());
    }

    public function refresh(RefreshTokenAction $refresh): JsonResponse
    {
        return response()->json($refresh->execute());
    }

    public function me(MeAction $me): JsonResponse
    {
        return response()->json($me->execute());
    }
}
