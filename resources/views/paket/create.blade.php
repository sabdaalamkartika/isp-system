@extends('layouts.app')

@section('content')
<h2>Tambah Paket</h2>

<form method="POST" action="{{ route('paket.store') }}">
    @csrf

    <div>
        <label>Nama Paket</label><br>
        <input type="text" name="nama_paket" required>
    </div>

    <div>
        <label>Kecepatan</label><br>
        <input type="text" name="kecepatan" required>
    </div>

    <div>
        <label>Harga</label><br>
        <input type="number" name="harga" required>
    </div>

    <br>
    <button type="submit">Simpan</button>
    <a href="{{ route('paket.index') }}">Batal</a>
</form>
@endsection
