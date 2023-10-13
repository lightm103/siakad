<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = [
        'pps_id',
        'nama_santri',
        'nik',
        'nisn',
        'no_kk',
        'domisili',
        'kelas',
        'tempat_lahir',
        'tanggal_lahir',
        'golongan_darah',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'nama_wali',
        'no_hp'
    ];
}
