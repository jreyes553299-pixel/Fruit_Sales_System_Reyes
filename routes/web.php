<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FruitController;
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
    
    // Fruit Routes
    Route::resource('fruits', FruitController::class);
    
    // Report Routes
    Route::get('reports', [FruitController::class, 'reports'])->name('fruits.reports');
    Route::get('reports/pdf', [FruitController::class, 'exportPdf'])->name('fruits.export.pdf');
    Route::get('reports/excel', [FruitController::class, 'exportExcel'])->name('fruits.export.excel');
});

require __DIR__ . '/auth.php';
