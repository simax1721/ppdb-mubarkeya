<?php

use App\Http\Controllers\Admin\DaftarulangController as AdminDaftarulangController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\NilaiController as AdminNilaiController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;
use App\Http\Controllers\Admin\SeleksiController as AdminSeleksiController;
use App\Http\Controllers\Admin\TimelineController as AdminTimelineController;
use App\Http\Controllers\Auth\AdminController as AuthAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\DashboardController;
use App\Http\Controllers\Siswa\FormulirController;
use App\Http\Controllers\Siswa\PengumumanController;
use App\Http\Controllers\Siswa\ProfilController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::auto('/', HomeController::class);


Route::prefix('admin')->group(function () {
    Route::auto('/', AuthAdminController::class);
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::auto('/', AdminHomeController::class);
    Route::auto('/jurusan', AdminJurusanController::class);
    Route::auto('/timeline', AdminTimelineController::class);
    Route::auto('/nilai', AdminNilaiController::class);
    Route::auto('/seleksi', AdminSeleksiController::class);
    Route::auto('/daftar-ulang', AdminDaftarulangController::class);
    Route::auto('/pengumuman', AdminPengumumanController::class);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::auto('/', DashboardController::class);

    Route::auto('/profil', ProfilController::class);
    Route::auto('/formulir', FormulirController::class);
    Route::auto('/pengumumanlulus', PengumumanController::class);

});

require __DIR__.'/auth.php';



