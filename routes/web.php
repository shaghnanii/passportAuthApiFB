<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\HomeDataController;
use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/getData', HomeDataController::class);

// Route::post('/register', [AuthController::class, 'register']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// github login routes 
Route::get('/signin/github', [SocialLoginController::class, 'github']);
Route::get('/signin/github/redirect', [SocialLoginController::class, 'githubRedirect']);

// facebook login routes 
Route::get('/signin/facebook', [SocialLoginController::class, 'facebook']);
Route::get('/signin/facebook/redirect', [SocialLoginController::class, 'facebookRedirect']);

// gmail login routes
Route::get('/signin/google', [SocialLoginController::class, 'google']);
Route::get('/signin/google/redirect', [SocialLoginController::class, 'googleRedirect']);


// PAYPAL Routes 
Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');
