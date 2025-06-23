<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TransactionController::class, 'index'])->name('home');
Route::get('/transactions/{type}', [TransactionController::class, 'list'])->name('transactions.list');
Route::get('/create', [TransactionController::class, 'create'])->name('create');
Route::post('/store', [TransactionController::class, 'store'])->name('store');
Route::get('/edit/{id}', [TransactionController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [TransactionController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [TransactionController::class, 'destroy'])->name('destroy');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');