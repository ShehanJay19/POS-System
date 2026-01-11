<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Home - Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// POS System Routes
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('sales', SaleController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
