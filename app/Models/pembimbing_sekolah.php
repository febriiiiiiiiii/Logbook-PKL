<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembimbing_sekolah extends Model
{
    use HasFactory;

    protected $table = 'pembimbing_sekolahs';

    protected $fillable = [
        'nama',
        'email',
        'telephone',
        'alamat',
    ];
}
