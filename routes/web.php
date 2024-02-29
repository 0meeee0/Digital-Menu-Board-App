<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\OperatorController;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);



Route::get('/profile/{user}', [UserProfileController::class, 'show'])->name('user.profile');
Route::put('/profile/{user}', [UserProfileController::class, 'update'])->name('user.update');


Route::middleware(['auth'])->group(function () {
    Route::get('/operator/dashboard', [OperatorController::class, 'index'])->name('operator.dashboard');

    Route::post('/operator/restaurant', [OperatorController::class, 'storeRestaurant'])->name('operator.restaurant.store');
    Route::delete('/operator/restaurant/{id}', [OperatorController::class, 'destroyRestaurant'])->name('operator.restaurant.destroy');
});
