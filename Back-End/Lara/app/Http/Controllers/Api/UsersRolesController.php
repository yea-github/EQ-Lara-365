<?php

namespace App\Http\Controllers\Api;

use App\Application\UsersRoles\GetAllUsersRolesAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UsersRolesController extends Controller
{
    public function getAllUsersRoles(GetAllUsersRolesAction $getAllUsersRoles): JsonResponse
    {
        return response()->json($getAllUsersRoles->execute());
    }
}
