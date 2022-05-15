<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'fetchAuthenticatedUser');
    Route::get('user/{id}', 'fetchMembershipInfo');
    Route::post('logout', 'logout')->middleware('auth');
});

Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
