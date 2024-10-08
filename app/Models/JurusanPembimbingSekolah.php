<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanPembimbingSekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'pembimbing_sekolah_id',
        'jurusan_sekolah_id',
    ];

    public function pembimbingSekolahs()
    {
        return $this->belongsTo(PembimbingSekolah::class);
    }

    public function jurusanSekolahs()
    {
        return $this->belongsTo(JurusanSekolah::class);
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}
