<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanSekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'sekolah_id',
        'jurusan_id',
    ];

    public function sekolahs()
    {
        return $this->belongsToMany(Sekolah::class);
    }

    public function jurusans()
    {
        return $this->belongsToMany(Jurusan::class);
    }

    public function pembimbingSekolahs()
    {
        return $this->hasMany(PembimbingSekolah::class);
    }
}
