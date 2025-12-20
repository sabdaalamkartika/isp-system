@extends('layouts.app')

@section('content')
<h2>Edit Paket</h2>

<form action="{{ route('paket.update', $paket->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nama Paket</label><br>
        <input type="text" name="nama_paket"
               value="{{ old('nama_paket', $paket->nama_paket) }}" required>
    </div>

    <br>

    <div>
        <label>Kecepatan</label><br>
        <input type="text" name="kecepatan"
               value="{{ old('kecepatan', $paket->kecepatan) }}" required>
    </div>

    <br>

    <div>
        <label>Harga</label><br>
        <input type="number" name="harga"
               value="{{ old('harga', $paket->harga) }}" required>
    </div>

    <br>

    <button type="submit">Update</button>
    <a href="{{ route('paket.index') }}">Batal</a>
</form>
@endsection
