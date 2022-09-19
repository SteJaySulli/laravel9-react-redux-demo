<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("auth")->as("auth.")->group(function() {
    Route::post("login", [AuthController::class, "login"])->name("login");
    Route::middleware('auth:sanctum')->group(function() {
        Route::get("user", [AuthController::class, "user"])->name("user");
        Route::any("logout", [AuthController::class, "logout"])->name("logout");
    });
});

// Route::middleware('auth:sanctum')->group(function() {
    Route::get("users", UserController::class)->name("users");
// });
