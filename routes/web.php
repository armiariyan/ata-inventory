<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MoldingController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route middleware for login first
Route::middleware(['auth'])->group(function () {
    // Machine
    Route::get('/machines', [MachineController::class, 'index'])->name('machine.home');
    Route::get('/machine/{id}', [MachineController::class, 'show'])->name('machine.details');
    Route::get('/machine/{id}/edit', [MachineController::class, 'edit'])->name('machine.edit');
    
    // Molding
    Route::get('/moldings', [MoldingController::class, 'index'])->name('molding.home');
    Route::get('/molding/{id}', [MoldingController::class, 'show'])->name('molding.details');
    Route::get('/molding/{id}/edit', [MoldingController::class, 'edit'])->name('molding.edit');
});
