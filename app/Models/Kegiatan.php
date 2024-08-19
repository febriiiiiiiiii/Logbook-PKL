<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jadwal_id',
        'judul',
        'deskripsi'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function jadwals()
    {
        return $this->belongsToMany(Jadwal::class);
    }
}
