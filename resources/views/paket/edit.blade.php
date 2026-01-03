@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Edit Paket</h2>

<form action="{{ route('paket.update', $paket->id) }}" method="POST" class="bg-white p-6 rounded  shadow w-full">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="block font-semibold">Nama Paket</label>
        <input type="text" name="nama_paket" bvalue="{{ old('nama_paket', $paket->nama_paket) }}" required class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-3">
        <label class="block font-semibold">Kecepatan</label>
        <input type="text" name="kecepatan" value="{{ old('kecepatan', $paket->kecepatan) }}" required class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-3">
        <label class="block font-semibold">Harga</label>
        <input type="number" name="harga" value="{{ old('harga', $paket->harga) }}" required class="w-full border px-3 py-2 rounded">
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Update</button>
    <a href="{{ route('paket.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
</form>
@endsection
