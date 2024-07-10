<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdineController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SquadraController;
use App\Http\Controllers\GiocatoreController;
use App\Http\Controllers\NotiziaController;
use App\Http\Controllers\ProdottoController;
use App\Http\Controllers\AllenatoreController;
use App\Http\Controllers\CarrelloController;
use App\Http\Controllers\ErroriController;




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
Route::get('/contatti', [FrontController::class, 'showContatti'])->name('showContatti');

Route::get('user/login', [AuthController::class, 'getLogin'])->name('user.login');
Route::post('user/login', [AuthController::class, 'postLogin']);

Route::get('user/registration', [AuthController::class, 'getRegistration'])->name('user.registration');
Route::post('user/registration', [AuthController::class, 'postRegistration']);

Route::get('user/logout', [AuthController::class, 'getLogout'])->name('user.logout');

Route::get('/notizie/{id_notizia}', [NotiziaController::class, 'show'])->name('notizia.show');
Route::get('/notizie', [NotiziaController::class, 'index'])->name('notizie.index');

Route::get('/shop', [ProdottoController::class, 'showShop'])->name('showShop');

Route::get('user/checkEmailAjax', [AuthController::class, 'checkEmailAjax']);


Route::middleware(['authControl'])->group(function(){
    Route::get('/carrello', [CarrelloController::class, 'show'])->name('carrello.show');
    Route::delete('/carrello/{id_dettaglio}', [CarrelloController::class, 'destroy'])->name('dettaglio.destroy');
    Route::post('/carrello/checkout', [OrdineController::class, 'checkout'])->name('carrello.checkout');
    Route::get('user/ordini', [OrdineController::class, 'ordineUtente'])->name('ordineUtente.index');
    Route::post('/carrello', [CarrelloController::class, 'aggiungiAlCarrello'])->name('aggiungiAlCarrello');
    Route::delete('/carrello/dettaglio/destroy/{dettaglio}', [CarrelloController::class, 'destroy'])->name('dettaglio.destroy');
    
});

Route::middleware(['giornalistaControl'])->group(function(){
    Route::get('/giornalista', [NotiziaController::class, 'getGiornalista'])->name('giornalista.index');
    Route::resource('/giornalista/notizie', NotiziaController::class)->except(['index']);
});


//Rotte per l'admin
Route::middleware(['adminControl'])->group(function () {
    Route::resource('admin/prodotti', ProdottoController::class);
    Route::resource('admin/allenatori', AllenatoreController::class);
    Route::resource('admin/giocatori', GiocatoreController::class);
    Route::get('/admin/giocatori/{id_giocatore}/update', [GiocatoreController::class, 'update'])->name('giocatore.update');
    Route::get('/admin/ordini', [OrdineController::class, 'index'])->name('ordini.index');
});

//Gestione degli errori
Route::get('/error-404' ,[ErroriController::class, 'notFound'])->name('notFound');
Route::get('/error-403', [ErroriController::class, 'forbidden'])->name('forbidden');
Route::get('/error-500', [ErroriController::class, 'internalServerError'])->name('internalServerError');





//Questa per ultima sennò si sovrappone
Route::get('/{squadra}', [SquadraController::class, 'show'])->name('squadra.show');

