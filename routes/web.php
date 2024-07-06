<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SquadraController;
use App\Http\Controllers\GiocatoreController;
use App\Http\Controllers\NotiziaController;
use App\Http\Controllers\ProdottoController;


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
Route::post('user/login', [AuthController::class, 'postLogin']);

Route::get('user/registration', [AuthController::class, 'getRegistration'])->name('user.registration');
Route::post('user/registration', [AuthController::class, 'postRegistration']);

Route::get('user/logout', [AuthController::class, 'getLogout'])->name('user.logout');


Route::resource('admin/giocatori', GiocatoreController::class);
Route::get('/admin/giocatori/{id_giocatore}/update', [GiocatoreController::class, 'update'])->name('giocatore.update');
Route::get('/admin/giocatori/{id_giocatore}/delete', [GiocatoreController::class, 'destroy'])->name('giocatore.delete');
Route::get('/admin/giocatori/{id_giocatore}/delete/confirm', [GiocatoreController::class, 'confirmDestroy'])->name('giocatore.confirmDelete');

//Rotte per le notizie

Route::resource('notizie', NotiziaController::class);
Route::get('/notizie/{id_notizia}', [NotiziaController::class, 'show'])->name('notizia.show');

//Rotta per la vista del giornalista
Route::get('/giornalista', [NotiziaController::class, 'getGiornalista'])->name('giornalista.index');

//Rotta per lo shop
Route::get('/shop', [ProdottoController::class, 'showShop'])->name('showShop');

//Rotte per la gestione del negozio lato admin
Route::resource('admin/prodotti', ProdottoController::class);

//Questo va in fondo alle rotte perché altrimenti si sovrappone
Route::get('/{squadra}', [SquadraController::class, 'show']) -> name('squadra.show');

