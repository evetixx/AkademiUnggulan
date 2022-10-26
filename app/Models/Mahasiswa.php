<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
        protected $table = 'mahasiswa';
        protected $fillable = [
        'nim',
        'nama',
        'angkatan',
        'jenis_kelamin',
        'irs',
        'sks',
        'sksk',
        'khs',
        'status_pkl',
        'status_skripsi',
        'status',
        'link_skripsi',
        'link_khs',
        'link_pkl',
        'tanggal sidang',
        'alamat',
        'no_hp',
        'dosen_wali',
    ];
}
