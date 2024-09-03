<?php

use App\Http\Controllers\JurusanController;
use App\Models\User;
use App\Http\Controllers\SekolahController;
use App\Models\Jadwal;
use App\Models\Jurusan;
use App\Models\PembimbingLapangan;
use App\Models\PembimbingSekolah;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('about');
});

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.post');
Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.delete');

Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
Route::post('/sekolah', [SekolahController::class, 'store'])->name('sekolah.post');
Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
Route::put('/sekolah/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
Route::delete('/sekolah/{id}', [SekolahController::class, 'destroy'])->name('sekolah.delete');


Route::get('/tugas1', function () {
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
    dump($jurusan);

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

    dump($sekolah);

});

Route::get('/tugas2', function() {
    $soal1 = User::first()->toArray();
    dump($soal1);

    $soal2 = User::all()->toArray();
    dump($soal2);

    $soal3 = User::where('id', '>', 5)->get()->toArray();
    dump($soal3);

    $soal4 = User::where('id', '>', 5)->limit(10)->get()->toArray();
    dump($soal4);

    $soal5 = User::where('id', '>', 5)->limit(10)->orderBy('name')->orderBy('email')->get()->toArray();
    dump($soal5);

    $soal6 = User::where('id', '>', 5)->limit(10)->orderBy('created_at')->get()->toArray();
    dump($soal6);

    $soal7 = User::where('id', '>', 5)->first()->toArray();
    dump($soal7);

    $soal8 = User::find(5)->toArray();;
    dump($soal8);

    $soal9 = User::where('id', 5)->select('name', 'email')->get()->toArray();
    dump($soal9);

    $soal10 = User::where('name', 'like', 'A%')->orWhere('email', 'like', 'A%')->get()->toArray();
    dump($soal10);

    $soal11 = User::where('name', 'like', 'A%')->orWhere('email', 'like', 'A%')->where('id', '>', 5)->get()->toArray();
    dump($soal11);

    $soal12 = User::where('name', 'like', 'A%')->orWhere('email', 'like', 'A%')->orWhere('name', 'like', '%admin%')->orWhere('email', 'like', '%admin%')->get()->toArray();
    dump($soal12);
});

Route::get('/tugas3', function() {
    $latihan1 = Siswa::first()->toArray();
    dump($latihan1);

    $latihan2 = Siswa::all()->toArray();
    dump($latihan2);

    $latihan3 = Siswa::where('id', '>', 5)->get()->toArray();
    dump($latihan3);

    $latihan4 = Siswa::where('id', '>', 5)->limit(10)->get()->toArray();
    dump($latihan4);

    $latihan5 = Siswa::where('id', '>', 5)->limit(10)->orderBy('nama')->orderBy('email')->get()->toArray();
    dump($latihan5);

    $latihan6 = Siswa::where('id', '>', 5)->limit(10)->orderBy('created_at')->get()->toArray();
    dump($latihan6);

    $latihan7 = Siswa::where('id', '>', 5)->first()->toArray();
    dump($latihan7);

    $latihan8 = Siswa::find(5)->toArray();;
    dump($latihan8);

    $latihan9 = Siswa::where('id', 5)->select('nama', 'email')->get()->toArray();
    dump($latihan9);

    $latihan10 = Siswa::where('nama', 'like', 'A%')->orWhere('email', 'like', 'A%')->get()->toArray();
    dump($latihan10);

    $latihan11 = Siswa::where('nama', 'like', 'A%')->orWhere('email', 'like', 'A%')->where('id', '>', 5)->get()->toArray();
    dump($latihan11);

    $latihan12 = Siswa::where('nama', 'like', 'A%')->orWhere('email', 'like', 'A%')->orWhere('nama', 'like', '%admin%')->orWhere('email', 'like', '%admin%')->get()->toArray();
    dump($latihan12);
});

Route::get('/tugas4', function() {
    dump('Mencari Jurusan yang memiliki JurusanSekolah');
    dump(Jurusan::has('jurusanSekolahs')->get()->toArray());

    dump('Mencari Jurusan yang tidak memiliki JurusanSekolah');
    dump(Jurusan::doesntHave('jurusanSekolahs')->get()->toArray());

    dump('Menncari jurusan pada sekolah dengan id 65');
    dump(Jurusan::whereHas('jurusanSekolahs', function ($query) {
        $query->where('sekolah_id', 65);
    })->get()->toArray());

    dump('Mencari daftar siswa yang terdaftar pada periode angkatan 2005');
    dump(Siswa::whereHas('angkatan', function ($query) {
        $query->where('periode', 2005);
    })->get());

    dump('Mencari pembimbing sekolah yang membimbing siswa pada periode angkatan 2024');
    dump(PembimbingSekolah::whereHas('siswas.angkatan', function ($query) {
        $query->where('periode', 2024);
    })->get()->toArray());

    dump('Mencari sekolah asal dari pembimbing sekolah bernama Lola)');
    dump(Sekolah::whereHas('jurusanSekolahs.pembimbingSekolahs', function ($query) {
        $query->where('nama', 'Lola');
    })->get()->toArray());

    dump('Mencari daftar siswa yang terdaftar di sekolah "Leffler Ltd" dengan jurusan "Fire Fighter"');
    dump(Siswa::whereHas('pembimbingSekolah.jurusanSekolah', function ($query) {
        $query->where('sekolah_id', 81)->where('jurusan_id', 76);
    })->get()->toArray());

    dump('Mencari daftar siswa yang dibimbing oleh Winona (PembimbingSekolah) pada periode angkatan 2044');
    dump(Siswa::whereHas('pembimbingSekolah', function ($query) {
        $query->where('nama', 'Winona');
    })->whereHas('angkatan', function ($query) {
        $query->where('periode', 2044);
    })->get()->toArray());    

    dump('Mencari daftar siswa yang berasal dari sekolah "O`Conner and Sons", jurusan "Computer Operator", dan dibimbing oleh PembimbingLapangan "Adrien"');
    dump(Siswa::whereHas('pembimbingSekolah.jurusanSekolah', function ($query) {
        $query->where('sekolah_id', 137)->where('jurusan_id', 106);
    })->whereHas('pembimbingLapangan', function ($query) {
        $query->where('nama', 'Adrien');
    })->get()->toArray());
    
    dump('Mencaari semua PembimbingLapangan yang membimbing siswa dengan email yang memiliki domain @example.com');
    dump(PembimbingLapangan::whereHas('siswas', function ($query) {
        $query->where('email', 'like', '%@example.com');
    })->get()->toArray());

    dump('Mencari Jadwal yang Terkait dengan Kegiatan Tertentu');
    dump(Jadwal::whereHas('kegiatans', function($query) {
        $query->where('judul', 'et');
    })->get()->toArray());
    
    dump('aaaaaaaaaaaaaaaaaaa');
    dump(Siswa::whereRelation('angkatan', 'periode', 2005)->get());

    dump(User::find(1));
    dump(User::query()->find(1)->delete());

});