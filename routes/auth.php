<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('alogin', [LoginController::class, 'alogin']);
Route::post('aregister', [RegisterController::class, 'aregister']);

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'fetchAuthenticatedUser');
    Route::get('user/{id}', 'fetchMembershipInfo');
    Route::post('logout', 'logout')->middleware('auth');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'fetchAuthenticatedAdmin');
    Route::post('alogout', 'logout')->middleware('auth:admin');
});
