<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Exchange\ExchangeController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();

    // exchanges
});

Route::group(['middleware' => ['auth:sanctum']], function () {
   
    
    Route::get('/all-exchanges', [ExchangeController::class, 'index'])->name('exchange.index');
    Route::post('/select-exchange', [ExchangeController::class, 'selectExchange'])->name('exchange.select');

});

