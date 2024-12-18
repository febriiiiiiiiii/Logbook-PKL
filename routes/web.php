<?php

use App\Http\Controllers\AngkatanController;
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

Route::middleware(['auth'])->group(function(){
    Route::get('/welcome', function () {
        return view('about');
    });
    
    Route::delete('/jurusan/{jurusan}', [SekolahController::class, 'destroy'])
        ->middleware('can:hapus-jurusan');
    
    Route::resource('sekolah', SekolahController::class)
        ->except(['destroy']);
    
    Route::delete('/sekolah/{sekolah}', [SekolahController::class, 'destroy'])
        ->name('sekolah.destroy')
        ->middleware(['can:hapus-sekolah']);

        
        
    Route::resource('angkatan', AngkatanController::class);
    
    Route::resource('jurusan', JurusanController::class);
    
    Route::resource('pembimbing_lapangan', PembimbingLapanganController::class);    

    Route::singleton('profile', ProfileController::class);
    
    Route::resource('sekolah', SekolahController::class);
    

});