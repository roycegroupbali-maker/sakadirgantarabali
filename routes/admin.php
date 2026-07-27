<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AspirationController as AdminAspirationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DirgaNewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PangkalanController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Seluruh route di file ini berada di bawah prefix /admin dan tidak
| mempengaruhi tampilan / route website publik yang sudah ada.
|
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Halaman login — hanya bisa diakses jika BELUM login sebagai admin.
    Route::middleware('admin.guest')->group(function () {
        Route::get('login', [AdminLoginController::class, 'create'])->name('login');
        Route::post('login', [AdminLoginController::class, 'store'])->name('login.store');
    });

    // Seluruh route berikut WAJIB login sebagai admin (guard: admin).
    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AdminLoginController::class, 'destroy'])->name('logout');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('news', DirgaNewsController::class)->except(['show']);
        Route::resource('gallery', GalleryController::class)->except(['show']);
        Route::get('members/pdf', [MemberController::class, 'exportPdf'])->name('members.pdf');
        Route::resource('members', MemberController::class)->except(['show']);
        Route::resource('pangkalan', PangkalanController::class)->except(['show']);

        // Kelola formulir Pendaftaran Anggota Baru yang masuk dari halaman publik.
        Route::get('pendaftaran', [AdminRegistrationController::class, 'index'])->name('pendaftaran.index');
        Route::get('pendaftaran/pdf', [AdminRegistrationController::class, 'exportPdf'])->name('pendaftaran.pdf');
        Route::patch('pendaftaran/{pendaftaran}', [AdminRegistrationController::class, 'update'])->name('pendaftaran.update');
        Route::delete('pendaftaran/{pendaftaran}', [AdminRegistrationController::class, 'destroy'])->name('pendaftaran.destroy');

        // Kelola laporan Layanan Aspirasi & Pelaporan Masyarakat.
        Route::get('aspirasi', [AdminAspirationController::class, 'index'])->name('aspirasi.index');
        Route::get('aspirasi/{aspirasi}', [AdminAspirationController::class, 'show'])->name('aspirasi.show');
        Route::patch('aspirasi/{aspirasi}', [AdminAspirationController::class, 'update'])->name('aspirasi.update');
        Route::delete('aspirasi/{aspirasi}', [AdminAspirationController::class, 'destroy'])->name('aspirasi.destroy');
    });
});
