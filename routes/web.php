<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Transactions\TransactionsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/transaction/{account}', [TransactionsController::class, 'store'])
    ->name('transaction.store');

Route::get('/transaction/{account}', [TransactionsController::class, 'index'])
    ->name('transaction.index');

Route::get('/transaction/{account}/history', [TransactionsController::class, 'history'])
    ->name('transaction.history');

Route::get('/secure', [LoginController::class, 'secure'])
    ->name('secure');

Route::post('/secure', [LoginController::class, 'storeSecure'])
    ->name('secure');

Route::get('/account', [AccountsController::class, 'index'])
    ->name('account');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');





