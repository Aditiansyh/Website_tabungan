<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MenabungController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('welcome-preview');
})->name('preview');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/tabungan', TabunganController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/tabungan/{id}/menabung', [MenabungController::class, 'create'])->name('menabung.create');
    Route::post('/tabungan/{id}/menabung', [MenabungController::class, 'store'])->name('menabung.store');
    Route::get('/tabungan/{id}/riwayat', [\App\Http\Controllers\MenabungController::class, 'riwayat'])->name('menabung.riwayat');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

Route::middleware('auth')->group(function () {
    Route::get('/menabung', [\App\Http\Controllers\MenabungController::class, 'formUmum'])->name('menabung.form');
    Route::post('/menabung', [\App\Http\Controllers\MenabungController::class, 'storeUmum'])->name('menabung.store.umum');
});

