<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HauraCeritaController;
use App\Http\Controllers\HauraKategoriController;
use App\Http\Controllers\HauraDaerahController;
use App\Http\Controllers\HauraFeedbackController;

Route::get('/', function () {
    return view('welcome');
});



// =======================
// 📍 HOME = redirect ke halaman utama
// =======================
Route::get('/', function () {
    return redirect('/cerita');
});

// =======================
// 📘 CERITA - Akses Umum (tanpa login)
// =======================
Route::get('/cerita', [HauraCeritaController::class, 'index'])->name('cerita.index');

// =======================
// 🔒 USER LOGIN - Kirim Feedback
// =======================
Route::middleware('auth')->group(function () {
    Route::post('/feedback', [HauraFeedbackController::class, 'store'])->name('feedback.store');
});

// =======================
// 🔐 ADMIN AREA - Harus login + role:admin
// =======================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('kategori', HauraKategoriController::class);
    Route::resource('daerah', HauraDaerahController::class);
    Route::resource('cerita', HauraCeritaController::class)->except(['index']);
});