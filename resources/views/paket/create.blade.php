@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Paket</h1>

<form method="POST" action="{{ route('paket.store') }}" class="bg-white p-6 rounded shadow w-full">
    @csrf

    <div class="mb-3">
        <label class="block font-semibold">Nama Paket</label>
        <input type="text" name="nama_paket" required class="border w-full px-3 py-2 rounded">
    </div>

    <div class="mb-3">
        <label class="block font-semibold">Kecepatan</label>
        <input type="text" name="kecepatan" required class="border w-full px-3 py-2 rounded">
    </div>

    <div  class="mb-3">
        <label class="block font-semibold">Harga</label>
        <input type="number" name="harga" required class="border w-full px-3 py-2 rounded">
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Simpan</button>
    <a href="{{ route('paket.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Batal</a>
</form>
@endsection
