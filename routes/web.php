<?php
use App\Models\User;
use App\Http\Controllers\SekolahController;
use App\Models\Jurusan;
use App\Models\Sekolah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sekolah', [SekolahController::class, 'index']);
Route::get('/projects', function () {
    return view('home', ['title' => 'Jurusan Page', 'jurusans' => Jurusan::all()]);
});

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