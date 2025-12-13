@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Client</h1>

<form action="{{ route('clients.store') }}" method="POST"
      class="bg-white p-6 rounded shadow w-full">
    @csrf

    <div class="mb-3">
        <label class="block font-semibold">Nama Client</label>
        <input type="text" name="nama_client"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-3">
        <label class="block font-semibold">Username PPPoE</label>
        <input type="text" name="username_pppoe"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-3">
        <label class="block font-semibold">Paket</label>
        <input type="text" name="paket"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-3">
        <label class="block font-semibold">No Telp</label>
        <input type="text" name="no_telp"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-3">
        <label class="block font-semibold">Alamat</label>
        <textarea name="alamat" class="w-full border px-3 py-2 rounded"></textarea>
    </div>

    <div class="mb-3">
        <label class="block font-semibold">Harga</label>
        <input type="number" name="harga"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-3">
        <label class="block font-semibold">Tagihan / Bulan</label>
        <input type="number" name="tagihan_per_bulan"
               class="w-full border px-3 py-2 rounded">
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    <a href="{{ route('clients.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
</form>
@endsection
