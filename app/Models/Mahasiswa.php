<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'nim',
        'jurusan'
    ];

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'id_mahasiswa');
    }
}
