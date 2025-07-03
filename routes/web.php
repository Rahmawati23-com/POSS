<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiPrintController;
use App\Http\Controllers\Auth\UserLoginController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/transaksi/{transaksi}/print', [TransaksiPrintController::class, 'print'])
    ->name('transaksi.print');