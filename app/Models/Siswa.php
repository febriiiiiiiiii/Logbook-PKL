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
        'pembimbing_sekolah_id' ,
        'pembimbing_lapangan_id',
    ];

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }

    public function pembimbingSekolah()
    {
        return $this->belongsTo(PembimbingSekolah::class);
    }

    public function pembimbingLapangan()
    {
        return $this->belongsTo(PembimbingLapangan::class);
    }
}
