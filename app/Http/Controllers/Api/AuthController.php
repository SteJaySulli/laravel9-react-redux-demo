<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    function user(): JsonResponse
    {
        if(!auth()->check()) {
            return response()->json([
                "user_id" => null,
            ]);    
        }

        return response()->json([
            "user_id" => auth()->id(),
            "name" => auth()->user()->name,
            "email" => auth()->user()->email,
        ]);
    }

    function login(LoginRequest $request): JsonResponse
    {
        auth()->attempt($request->validated());
        if(!auth()->check()) {
            return response()->json([
                "errors" => [
                    "email" => "The provided credentials do not match our records",
                ]
            ], 403);
        }
        return response()->json([
            "user_id" => auth()->id(),
            "name" => auth()->user()->name,
            "email" => auth()->user()->email,
        ]);
    }

    function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json([
            "success" => true,
        ]);
    }
}
