<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan_pembimbing_sekolah extends Model
{
    use HasFactory;

    protected $table = 'jurusan_pembimbing_sekolahs';

    protected $fillable = [
        'pembimbing_sekolah_id',
        'jurusan_sekolah_id',
    ];

    public function pembimbingSekolah()
    {
        return $this->belongsTo(PembimbingSekolah::class, 'pembimbing_sekolah_id');
    }

    public function jurusanSekolah()
    {
        return $this->belongsTo(JurusanSekolah::class, 'jurusan_sekolah_id');
    }
}
