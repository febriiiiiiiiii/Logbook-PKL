<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingLapangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama' ,
        'email' ,
        'telephone' ,
        'alamat',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
