<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BagController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return redirect('/bags');
});

Route::resource('bags', BagController::class);

Route::get('/orders/create', [OrderController::class, 'create']);
Route::post('/orders/store', [OrderController::class, 'store']);