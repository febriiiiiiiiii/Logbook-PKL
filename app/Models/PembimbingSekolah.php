<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'jurusan_sekolah_id	',
        'gender',
    ];

    public function jurusanSekolah()
    {
        return $this->belongsTo(JurusanSekolah::class);
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }

    protected function fullname(): Attribute
    {
        return Attribute::make(
            get: fn () => ($this->gender === 'P' ? 'Ibu ' : ($this->gender === 'L' ? 'Bapak ' : 'Nihil')) . $this->nama,
        );
    }

    protected function nama(): Attribute
    {
        return Attribute::make(
            set:fn (string $value)=>ucwords($value),
        );
    }
}