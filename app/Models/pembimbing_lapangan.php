<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembimbing_lapangan extends Model
{
    use HasFactory;

    protected $table = 'pembimbing_lapangans';

    protected $fillable = [
        'nama' ,
        'email' ,
        'telephone' ,
        'alamat',
    ];
}
