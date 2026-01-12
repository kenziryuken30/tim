<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

Route::get('/peminjaman', [PeminjamanController::class, 'index'])
    ->name('peminjaman.index');

Route::post('/peminjaman', [PeminjamanController::class, 'store'])
    ->name('peminjaman.store');

Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show'])
    ->name('peminjaman.show');

Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])
    ->name('peminjaman.destroy');

