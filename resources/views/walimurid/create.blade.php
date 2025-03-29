@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Pendaftaran Wali Murid</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('walimurid.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">NIK</label>
            <input type="text" name="nik" class="form-control" required maxlength="16">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor WhatsApp</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Agama</label>
            <input type="text" name="agama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hubungan Keluarga</label>
            <input type="text" name="hubungan_keluarga" class="form-control" required>
        </div>

        <h3>Data Siswa</h3>
        <div class="mb-3">
            <label class="form-label">Nama Siswa</label>
            <input type="text" name="siswa_nama[]" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">NISN</label>
            <input type="text" name="siswa_nisn[]" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
@endsection
