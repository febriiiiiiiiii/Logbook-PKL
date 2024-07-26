<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

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
        return $this->belongsTo(Angkatan::class, 'angkatan_id');
    }

    public function jurusanPembimbingSekolah()
    {
        return $this->belongsTo(JurusanPembimbingSekolah::class, 'jurusan_pembimbing_sekolah_id');
    }

    public function pembimbingLapangan()
    {
        return $this->belongsTo(PembimbingLapangan::class, 'pembimbing_lapangan_id');
    }
}
