<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface AuthControllerInterface
{
    public function register(Request $request): JsonResponse;
    public function login(Request $request): JsonResponse;
    public function connected(Request $request): User;
    public function logout(Request $request): JsonResponse;
}
