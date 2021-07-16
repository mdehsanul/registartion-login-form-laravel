<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/registrationform', function () {
    return view('registrationform');
});

Route::get('/loginform', function () {
    return view('loginform');
});

Route::get('/registrationform', [UserController::class, 'showRegistrationform'])->middleware('isAlreadyLoggedIn');
Route::get('/loginform', [UserController::class, 'showLoginform'])->middleware('isAlreadyLoggedIn');

Route::post('/user-register-success', [UserController::class, 'getRegistrationData'])->name('user-register-success');
Route::post('/user-login-success', [UserController::class, 'getloginData'])->name('user-login-success');

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [UserController::class, 'logout']);
