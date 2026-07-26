<?php

use App\Http\Controllers\AspirationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicApiController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// Endpoint JSON read-only (opsional) untuk pengembangan tampilan publik lebih lanjut.
Route::prefix('public-data')->name('public-data.')->group(function () {
    Route::get('news', [PublicApiController::class, 'news'])->name('news');
    Route::get('gallery', [PublicApiController::class, 'gallery'])->name('gallery');
    Route::get('members', [PublicApiController::class, 'members'])->name('members');
});

// Formulir Pendaftaran Anggota Baru (halaman "Ayo Gabung").
Route::post('pendaftaran', [RegistrationController::class, 'store'])->name('pendaftaran.store');

// Formulir Layanan Aspirasi & Pelaporan Masyarakat.
Route::post('aspirasi', [AspirationController::class, 'store'])->name('aspirasi.store');
Route::get('aspirasi/cek', [AspirationController::class, 'check'])->name('aspirasi.check');

// Route Panel Admin (lihat routes/admin.php) — tidak mengubah route publik di atas.
require __DIR__.'/admin.php';
