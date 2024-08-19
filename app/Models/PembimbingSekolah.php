<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingSekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'telephone',
        'alamat',
        'jurusan_sekolah_id	'
    ];

    public function jurusanSekolah()
    {
        return $this->belongsTo(JurusanSekolah::class);
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}
