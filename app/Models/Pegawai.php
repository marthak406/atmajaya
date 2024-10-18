<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'divisi'
    ];

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'id_user_verifikasi');
    }
}
