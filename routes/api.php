<?php
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\UserPaymentMethodController;
use App\Http\Controllers\PinopayController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\UserVoucherController;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MembershipController;


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


Route::post('upload/{id}', [ImageController::class, 'upload']);
Route::get('paymentmethod', [PaymentMethodController::class, 'fetchAll']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/cuisines', [CuisineController::class, 'index']);
Route::put('membership/{id}', [MembershipController::class, 'updateRewardTime']);
Route::put('user/{id}', [UserController::class, 'updateIncentives']);
Route::resource('menu', 'App\Http\Controllers\MenuController');

Route::controller(OrderController::class)->group(function () {
    Route::get('order', 'fetchAll');
    Route::get('order/{id}', 'fetchSpecificUser');
    Route::post('order', 'store');
    Route::put('order/{id}', 'update');
    Route::get('requestdashboard', 'fetchAll');
});

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

Route::controller(MenuController::class)->group(function () {
    Route::get('dashboard/{qty}', 'fetchTopTotalOrders');
    Route::get('/products', 'index');
    Route::get('marketplace', 'fetchAll');
    Route::get('productslisting', 'fetchAll');
    Route::get('menu', 'index');
    Route::post('menu', 'store');
    Route::put('menu', 'update');
    Route::delete('menu', 'destroySelected');
});