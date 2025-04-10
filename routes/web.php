<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/users',[UserController::class, 'index']);

});