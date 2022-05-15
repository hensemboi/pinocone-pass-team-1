<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/feedback', [FeedbackController::class, 'getfeedback'])->name('get.feedback');
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

require __DIR__.'/auth.php';

// Route::get('/', function(){
//     return view('layouts.base_layout');
// });

Route::get('/{slug}', function(){
    return view('layouts.base_layout');
});
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/membership/index', [FrontController::class, 'index'])->name('index');

Route::get('/membership/contact-us', [FrontController::class, 'contact'])->name('contact');
Route::post('/post/membership/contact-us', [ContactController::class, 'postcontact'])->name('post.contact');
Route::get('/membership/login', [FrontController::class, 'login'])->name('membership.login');
Route::post('/post/membership/login', [FrontController::class, 'authenticate'])->name('post.login');
Route::get('/membership/register', [FrontController::class, 'register'])->name('register');
Route::post('/post/membership/register', [FrontController::class, 'postregister'])->name('register');
Route::post('/post/membership/profile', [FrontController::class, 'postprofile'])->name('profile');


Route::post('/post/feedback', [FeedbackController::class, 'feedback'])->name('feedback');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/membership/subscribe/basic', [PackageController::class, 'basic'])->name('basic');
    Route::get('/membership/subscribe/standard', [PackageController::class, 'standard'])->name('standard');
    Route::get('/membership/subscribe/premium', [PackageController::class, 'premium'])->name('premium');

    Route::get('/membership/basic', [PackageController::class, 'basicc'])->name('basicc');
    Route::get('/membership/standard', [PackageController::class, 'standardd'])->name('standardd');
    Route::get('/membership/premium', [PackageController::class, 'premiumm'])->name('premiumm');

    Route::get('/membership/logout', [FrontController::class, 'logout'])->name('logout');
    Route::get('/membership/profile', [FrontController::class, 'profile'])->name('profile');
});

Route::get('/membership/email', [FrontController::class, 'email'])->name('email');
