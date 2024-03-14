<?php

use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\TrendsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::controller(PurchasesController::class)->group(function () {
    Route::get('/purchases', 'index')->name('purchases.index');
    Route::post('/purchases', 'store')->name('purchases.store');
    Route::put('/purchases/{id}', 'update')->name('purchases.update');
    Route::get('/purchases/fork', 'forkToSeries')->name('purchases.fork');
    Route::get('/purchases/all', 'getPurchases')->name('purchases.all');
});

Route::controller(TrendsController::class)->group(function () {
    Route::get('/trends', 'index')->name('trends.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
