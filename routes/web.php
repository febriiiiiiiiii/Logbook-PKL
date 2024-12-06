<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PembimbingLapanganController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\Serverside\JurusanServersideController;
use App\Models\Jadwal;
use App\Models\Jurusan;
use App\Models\PembimbingLapangan;
use App\Models\PembimbingSekolah;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('overview');
});

Route::get('/dashboard', function () {
    return view('about');
})->middleware(['auth']);

Route::get('/admin', function () {
    return "<h1>halo admin</h1>";
})->middleware(['auth', 'role:admin']);

Route::delete('/jurusan/{jurusan}', [SekolahController::class, 'destroy'])
    ->middleware('can:hapus-jurusan');

Route::resource('sekolah', SekolahController::class)
    ->except(['destroy'])
    ->middleware(['auth']);

Route::delete('/sekolah/{sekolah}', [SekolahController::class, 'destroy'])
    ->name('sekolah.destroy')
    ->middleware(['auth', 'can:hapus-jurusan']);

Route::singleton('profile', ProfileController::class);

Route::resource('jurusan', JurusanController::class);

Route::resource('jurusanserverside', JurusanServersideController::class);

Route::resource('sekolah', SekolahController::class);

Route::resource('pembimbingLapangan', PembimbingLapanganController::class);
