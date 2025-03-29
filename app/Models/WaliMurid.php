<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliMurid extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'nomor_whatsapp',
        'alamat',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'hubungan_keluarga',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
