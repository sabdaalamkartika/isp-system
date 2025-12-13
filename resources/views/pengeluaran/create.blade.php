@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold mb-4">Tambah Pengeluaran</h1>

    <form action="{{ route('pengeluaran.store') }}" method="POST" class="bg-white p-6 rounded shadow w-full">
        @csrf

        <div class="mb-3">
            <label class="block font-semibold">Deskripsi:</label>
            <input type="text" name="deskripsi" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Tanggal:</label>
            <input type="date" name="tgl" required class="w-full border px-3 py-2">
        </div>
        
        <div class="mb-3">
            <label class="block font-semibold">Penanggung Jawab:</label>
            <input type="text" name="pj" required class="w-full border px-3 py-2">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Nominal:</label>
            <input type="number" name="nominal" required class="w-full border px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('pengeluaran.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
    </form>

    <br>
    

@endsection