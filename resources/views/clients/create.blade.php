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

    <div class="mb-4">
        <label class="block font-medium">Paket</label>
        <select name="paket_id" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Pilih Paket --</option>
            @foreach($pakets as $paket)
                <option value="{{ $paket->id }}">
                    {{ $paket->nama_paket }} - {{ $paket->kecepatan }} - Rp {{ number_format($paket->harga,0,',','.') }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">No Telp</label>
        <input type="text" name="no_telp"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-3">
        <label class="block font-semibold">Alamat</label>
        <textarea name="alamat" class="w-full border px-3 py-2 rounded"></textarea>
    </div>

    <div class="mb-4">
        <label class="block font-medium">Tanggal Daftar</label>
        <input type="date" name="tanggal_daftar"
            value="{{ date('Y-m-d') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-4">
        <label class="block font-medium">Status</label>
        <input type="hidden" name="status" value="aktif">

    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    <a href="{{ route('clients.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
</form>
@endsection
