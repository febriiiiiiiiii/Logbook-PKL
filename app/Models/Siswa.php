<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama' ,
        'alamat' ,
        'email' ,
        'telephone' ,
        'angkatan_id' ,
        'jurusan_pembimbing_sekolah' ,
        'pembimbing_lapangan_id',
    ];

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }

    public function jurusanPembimbingSekolah()
    {
        return $this->belongsTo(JurusanPembimbingSekolah::class);
    }

    public function pembimbingLapangan()
    {
        return $this->belongsTo(PembimbingLapangan::class);
    }
}
