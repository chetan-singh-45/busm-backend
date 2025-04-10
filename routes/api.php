<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Exchange\ExchangeController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();

    // exchanges
});

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/all-exchanges', [ExchangeController::class, 'index'])->name('exchange.index');
    Route::post('/select-exchange', [ExchangeController::class, 'selectExchange'])->name('exchange.select');
    Route::get('/exchageWithTickers',[ExchangeController::class, 'exchageWithTickers']);

    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::post('/users/update/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

});

Route::post('/exchange-stocks/{id}',[ExchangeController::class, 'exchangeStocks']);
Route::get('/stockwithExchage',[ExchangeController::class, 'stockwithExchage']);
Route::get('/stock/eod',[ExchangeController::class, 'getEOD']);
