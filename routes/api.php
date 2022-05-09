<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestUserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\UserPaymentMethodController;
use App\Http\Controllers\PinopayController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\UserVoucherController;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\CategoryController;

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

Route::controller(OrderController::class)->group(function () {
    Route::get('order', 'fetchAll');
    Route::get('order/{id}', 'fetchSpecificUser');
    Route::post('order', 'store');
    Route::put('order/{id}', 'update');
});

Route::get('marketplace', [MenuController::class, 'fetchAll']);
Route::get('productslisting', [MenuController::class, 'fetchAll']);
Route::get('productslistingcat', [CategoryController::class, 'fetchAll']);
Route::get('productslistingcui', [CuisineController::class, 'fetchAll']);
Route::get('paymentmethod', [PaymentMethodController::class, 'fetchAll']);

Route::controller(UserPaymentMethodController::class)->group(function () {
    Route::get('userpaymentmethod', 'fetchAll');
    Route::get('userpaymentmethod/{id}', 'fetchSpecificUser');
    Route::post('userpaymentmethod', 'store');
    Route::put('userpaymentmethod/{id}', 'update');
});

Route::controller(PinopayController::class)->group(function () {
    Route::get('pinopay', 'fetchAll');
    Route::get('pinopay/{id}', 'fetchSpecificUser');
    Route::post('pinopay', 'store');
    Route::put('pinopay/{id}', 'update');
});

Route::controller(VoucherController::class)->group(function () {
    Route::get('voucher', 'fetchAll');
    Route::put('voucher/{id}', 'update');
});

Route::controller(UserVoucherController::class)->group(function () {
    Route::get('uservoucher/{id}', 'fetchVoucherInformation');
    Route::post('uservoucher', 'store');
    Route::delete('uservoucher/{id}', 'destroy');
});

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'fetchAuthenticatedUser');
    Route::put('user/{id}', 'updateIncentives');
});

Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('menu', 'App\Http\Controllers\MenuController');

Route::get('dashboard/{qty}', [MenuController::class, 'fetchTopTotalOrders']);
