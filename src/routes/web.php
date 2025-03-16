<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AddressController::class, 'create'])->name('create');
Route::post('/', [AddressController::class, 'store'])->name('store');

Route::get('/list', [AddressController::class, 'show'])->name('list.show');
Route::get('/list/{user_id}', [AddressController::class, 'getDetails'])->name('list.getDetails');
Route::delete('/list/{user_id}', [AddressController::class, 'destroy'])->name('list.destroy');
