<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')
    ->group(function () {
        Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
        Route::post('/register', RegisterController::class)->name('auth.register');
        Route::middleware(['auth:sanctum'])->get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

        Route::middleware(['auth:sanctum'])
            ->group(function () {
                Route::get('/user', function (Request $request) {
                    return $request->user();
                });
            });
    });
