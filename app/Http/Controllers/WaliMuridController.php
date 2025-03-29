<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaliMurid;
use App\Models\Siswa;

class WaliMuridController extends Controller
{
    public function create()
    {
        return view('walimurid.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|digits:16|unique:wali_murids,nik',
            'nama' => 'required|string|max:255',
            'phone' => 'required',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'hubungan_keluarga' => 'required|string',
            'siswa_nama.*' => 'required|string',
            'siswa_nisn.*' => 'required|numeric|unique:siswas,nisn',
            'siswa_tanggal_lahir.*' => 'required|date',
        ]);

        $waliMurid = WaliMurid::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'nomor_whatsapp' => $request->phone,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'hubungan_keluarga' => $request->hubungan_keluarga,
        ]);

        foreach ($request->siswa_nama as $index => $namaSiswa) {
            Siswa::create([
                'wali_murid_id' => $waliMurid->id,
                'nama' => $namaSiswa,
                'nisn' => $request->siswa_nisn[$index],
                'tanggal_lahir' => $request->siswa_tanggal_lahir[$index],
            ]);
        }

        return redirect()->route('walimurid.create')->with('success', 'Registrasi berhasil!');
    }
}
