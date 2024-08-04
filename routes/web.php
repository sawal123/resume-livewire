<?php

use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\Akademi\Pendidikan;
use App\Livewire\Pengalaman;
use App\Livewire\Dokumen\Index as Dokumen;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::middleware(['auth', 'verified'])->group(function () {
        // Route::get('/experience', Pengalaman::class)->name('pengalaman');
        Route::view('pengalaman', 'pengalaman')->name('pengalaman');
        // Route::view('pendidikan', 'pendidikan')->name('pendidikan');
        // Route::get('/pendidikan', Pendidikan::class)->name('pendidikan');
        Route::get('/pendidikan', [PendidikanController::class , 'index'])->name('pendidikan');
        Route::get('/dokumen', Dokumen::class)->name('dokumen');
    });

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
