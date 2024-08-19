<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'telephone',
    ];

    public function jurusanSekolahs()
    {
        return $this->hasMany(JurusanSekolah::class);
    }
}
