<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestUserController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('productslisting', [MenuController::class, 'fetchAll']);
Route::get('productslistingcat', [CategoryController::class, 'fetchAll']);
Route::get('productslistingcui', [CuisineController::class, 'fetchAll']);

Route::post('login', [TestUserController::class, 'login']);
Route::post('register', [TestUserController::class, 'register']);
Route::post('logout', [TestUserController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('', [OrderController::class, '']);

// Route::post('login', [UserController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
// Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

// Route::group(['prefix' => 'books', 'middleware' => 'auth:sanctum'], function () {
//     Route::get('/', [BookController::class, 'index']);
//     Route::post('add', [BookController::class, 'add']);
//     Route::get('edit/{id}', [BookController::class, 'edit']);
//     Route::post('update/{id}', [BookController::class, 'update']);
//     Route::delete('delete/{id}', [BookController::class, 'delete']);
// });
<<<<<<< Updated upstream
=======

Route::resource('menu', 'App\Http\Controllers\MenuController');

Route::get('dashboard/{qty}', [MenuController::class, 'fetchTopTotalOrders']);
>>>>>>> Stashed changes
