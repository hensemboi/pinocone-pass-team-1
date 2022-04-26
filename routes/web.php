<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [TestRegisterController::class, 'index']);
// Route::post('/', [TestRegisterController::class, 'store']);

// Auth::routes(['verify' => true]);


Route::get('/{slug}', function(){
    return view('layouts.base_layout',[

    ]);
});

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<<<<<<< Updated upstream




=======
>>>>>>> Stashed changes
Route::get('/pinocone/index', [FrontController::class, 'index'])->name('index');

Route::get('/pinocone/contact-us', [FrontController::class, 'contact'])->name('contact');
Route::post('/post/pinocone/contact-us', [ContactController::class, 'postcontact'])->name('post.contact');
Route::get('/pinocone/login', [FrontController::class, 'login'])->name('pinocone.login');
Route::post('/post/pinocone/login', [FrontController::class, 'authenticate'])->name('post.login');
Route::get('/pinocone/register', [FrontController::class, 'register'])->name('register');
Route::post('/post/pinocone/register', [FrontController::class, 'postregister'])->name('register');
Route::post('/post/pinocone/profile', [FrontController::class, 'postprofile'])->name('profile');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/pinocone/subscribe/basic', [PackageController::class, 'basic'])->name('basic');
    Route::get('/pinocone/subscribe/standard', [PackageController::class, 'standard'])->name('standard');
    Route::get('/pinocone/subscribe/premium', [PackageController::class, 'premium'])->name('premium');

    Route::get('/pinocone/basic', [PackageController::class, 'basicc'])->name('basicc');
    Route::get('/pinocone/standard', [PackageController::class, 'standardd'])->name('standardd');
    Route::get('/pinocone/premium', [PackageController::class, 'premiumm'])->name('premiumm');

    Route::get('/pinocone/logout', [FrontController::class, 'logout'])->name('logout');
<<<<<<< Updated upstream



    Route::get('/pinocone/profile', [FrontController::class, 'profile'])->name('profile');
});
=======
    Route::get('/pinocone/profile', [FrontController::class, 'profile'])->name('profile');
});

>>>>>>> Stashed changes
Route::get('/pinocone/email', [FrontController::class, 'email'])->name('email');
