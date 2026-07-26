<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// Endpoint JSON read-only (opsional) untuk pengembangan tampilan publik lebih lanjut.
Route::prefix('public-data')->name('public-data.')->group(function () {
    Route::get('news', [PublicApiController::class, 'news'])->name('news');
    Route::get('gallery', [PublicApiController::class, 'gallery'])->name('gallery');
    Route::get('members', [PublicApiController::class, 'members'])->name('members');
});

// Route Panel Admin (lihat routes/admin.php) — tidak mengubah route publik di atas.
require __DIR__.'/admin.php';
