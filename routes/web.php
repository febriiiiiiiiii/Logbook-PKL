<?php

use App\Models\Jurusan;
use App\Models\Sekolah;
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
    $angkatanPeriode = '2022';

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

Route::get('/soal3', function () {
    $jurusan = Jurusan::select('jurusans.nama')
    ->join('jurusan_sekolahs', 'jurusans.id', '=', 'jurusan_sekolahs.jurusan_id')
    ->join('sekolahs', 'jurusan_sekolahs.sekolah_id', '=', 'sekolahs.id')
    ->join('jurusan_pembimbing_sekolahs', 'jurusan_sekolahs.id', '=', 'jurusan_pembimbing_sekolahs.jurusan_sekolah_id')
    ->join('siswas', 'jurusan_pembimbing_sekolahs.id', '=', 'siswas.jurusan_pembimbing_sekolah_id')
    ->join('angkatans', 'siswas.angkatan_id', '=', 'angkatans.id')
    ->where('sekolahs.nama', 'Orn, Kautzer and Kassulke')
    ->where('angkatans.periode', 2022)
    ->distinct()
    ->get();

    dd($jurusan);
});

Route::get('/soal4', function () {
    $sekolah = Sekolah::select('sekolahs.nama')
        ->distinct()
        ->join('jurusan_sekolahs', 'sekolahs.id', '=', 'jurusan_sekolahs.sekolah_id')
        ->join('jurusans', 'jurusan_sekolahs.jurusan_id', '=', 'jurusans.id')
        ->join('jurusan_pembimbing_sekolahs', 'jurusan_sekolahs.id', '=', 'jurusan_pembimbing_sekolahs.jurusan_sekolah_id')
        ->join('siswas', 'jurusan_pembimbing_sekolahs.id', '=', 'siswas.jurusan_pembimbing_sekolah_id')
        ->join('angkatans', 'siswas.angkatan_id', '=', 'angkatans.id')
        ->where('angkatans.periode', '2022')
        ->where('jurusans.nama', 'Optical Instrument Assembler')
        ->get();

    dd($sekolah);
});
