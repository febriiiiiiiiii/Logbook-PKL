<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/soal1', function () {
    $sekolahNama = 'Fahey PLC';

    $periodeAngkatan = DB::table('sekolahs as s')
        ->join('jurusan_sekolahs as js', 's.id', '=', 'js.sekolah_id')
        ->join('jurusan_pembimbing_sekolahs as jps', 'js.id', '=', 'jps.jurusan_sekolah_id')
        ->join('siswas as si', 'jps.id', '=', 'si.jurusan_pembimbing_sekolah_id')
        ->join('angkatans as a', 'si.angkatan_id', '=', 'a.id')
        ->select('a.periode')
        ->distinct()
        ->where('s.nama', $sekolahNama)
        ->get();

    dump($periodeAngkatan);
});

Route::get('/soal2', function () {
    $angkatanPeriode = '2024';

    $sekolahs = DB::table('sekolahs')
        ->join('jurusan_sekolahs', 'sekolahs.id', '=', 'jurusan_sekolahs.sekolah_id')
        ->join('jurusan_pembimbing_sekolahs', 'jurusan_sekolahs.id', '=', 'jurusan_pembimbing_sekolahs.jurusan_sekolah_id')
        ->join('siswas', 'jurusan_pembimbing_sekolahs.id', '=', 'siswas.jurusan_pembimbing_sekolah_id')
        ->join('angkatans', 'siswas.angkatan_id', '=', 'angkatans.id')
        ->select('sekolahs.nama')
        ->distinct()
        ->where('angkatans.periode', $angkatanPeriode) 
        ->get();
        
    dump($sekolahs);
});
// Route::get('/coba', function () {
//     $schoolName = 'Fahey PLC';

//     $angkatanPeriode = DB::table('sekolahs')
//         ->join('jurusan_sekolahs', 'jurusan_sekolahs.sekolah_id', '=', 'sekolahs.id')
//         ->join('siswas', 'siswas.jurusan_id', '=', 'jurusan_sekolahs.jurusan_id')
//         ->join('angkatans', 'angkatans.id', '=', 'siswas.angkatan_id')
//         ->select('angkatans.periode')
//         ->distinct()
//         ->where('sekolahs.nama', $schoolName)
//         ->get();

//     dd($angkatanPeriode);
// });
