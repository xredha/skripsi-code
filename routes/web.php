<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubkriteriaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function() {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::prefix('kriteria')->group(function() {
        Route::get('/', [KriteriaController::class, 'index'])->name('kriteria.index');
        Route::get('/create', [KriteriaController::class, 'create'])->name('kriteria.create');
        Route::post('/', [KriteriaController::class, 'store'])->name('kriteria.store');
        Route::get('/{id}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
        Route::put('/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
        Route::delete('/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
    });

    Route::prefix('subkriteria')->group(function() {
        Route::get('/', [SubkriteriaController::class, 'index'])->name('subkriteria.index');
        Route::get('/create', [SubkriteriaController::class, 'create'])->name('subkriteria.create');
        // Route::post('/', [SubkriteriaController::class, 'store'])->name('subkriteria.store');
        Route::get('/{kriteria_id}/edit', [SubkriteriaController::class, 'edit'])->name('subkriteria.edit');
        // Route::put('/{id}', [SubkriteriaController::class, 'update'])->name('subkriteria.update');
        // Route::delete('/{id}', [SubkriteriaController::class, 'destroy'])->name('subkriteria.destroy');
    });

    Route::prefix('alternatif')->group(function() {
        Route::get('/', [AlternatifController::class, 'index'])->name('alternatif.index');
        Route::get('/create', [AlternatifController::class, 'create'])->name('alternatif.create');
        Route::post('/', [AlternatifController::class, 'store'])->name('alternatif.store');
        Route::get('/{id}/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
        Route::put('/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
        Route::delete('/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');
    });
});
