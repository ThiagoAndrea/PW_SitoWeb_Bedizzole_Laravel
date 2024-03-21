<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;


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

Route::get('/', [FrontController::class, 'getHome'])->name('home');

Route::get('user/login', [AuthController::class, 'getLogin'])->name('user.login');
Route::post('user/login', [AuthController::class, 'postLogin'])->name('user.login');

Route::get('user/registration', [AuthController::class, 'getRegistration'])->name('user.registration');
Route::post('user/registration', [AuthController::class, 'postRegistration'])->name('user.registration');