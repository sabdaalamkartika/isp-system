@extends('layouts.app')

@section('content')


    <h1 class="text-2xl font-bold mb-4">Edit Pengeluaran</h1>

    <form action="{{ route('pengeluaran.update', $data->id) }}" method="POST" class="bg-white p-6 rounded shadow w-full">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block font-semibold">Deskripsi:</label>
            <input type="text" name="deskripsi" value="{{ $data->deskripsi }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Tanggal:</label>
            <input type="date" name="tgl" value="{{ $data->tgl }}" required class="w-full border px-3 py-2">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Penanggung Jawab:</label>
            <input type="text" name="pj" value="{{ $data->pj }}" required class="w-full border px-3 py-2">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Nominal:</label>
            <input type="number" name="nominal" value="{{ $data->nominal }}" required class="w-full border px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('pengeluaran.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
    </form>

@endsection
