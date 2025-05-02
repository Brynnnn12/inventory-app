<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ItemInController;
use App\Http\Controllers\ItemOutController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::middleware(['auth', 'role:admin'])->group(function () {
            Route::resource('categories', CategoriesController::class);
            Route::resource('suppliers', SuppliersController::class);
            Route::resource('items', ItemsController::class);
        });

        Route::middleware(['auth', 'role:user|admin'])->group(function () {
            Route::resource('itemsIn', ItemInController::class);
            Route::resource('itemsOut', ItemOutController::class);
        });
    });
});


require __DIR__ . '/auth.php';
