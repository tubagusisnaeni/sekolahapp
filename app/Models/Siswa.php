<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'wali_murid_id',
        'nama',
        'nisn',
        'tanggal_lahir',
        'kelas',
    ];

    public function waliMurid()
    {
        return $this->belongsTo(WaliMurid::class);
    }
}
