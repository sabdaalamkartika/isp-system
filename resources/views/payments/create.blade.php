@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Pembayaran</h1>

<form action="{{ route('payments.store') }}" method="POST"
        class="bg-white p-6 rounded shadow w-full">
    @csrf
<div class="mb-3">
    <label class="block font-semibold">Pilih Client:</label>
        <select name="client_id" required class="w-full border px-3 py-2 rounded">
            <option value="">-- Pilih Client --</option>
            @foreach($clients as $c)
                <option value="{{ $c->id }}">{{ $c->nama_client }}</option>
            @endforeach
        </select>
</div>

<div class="mb-3">
    <label class="block font-semibold">Tanggal Pembayaran:</label>
    <input type="date" name="tanggal_pembayaran" required
            class="w-full border px-3 py-2 rounded"> 
</div>

<div class="mb-3">
    <label class="block font-semibold">Nominal:</label>
    <input type="number" name="nominal" required
            class="w-full border px-3 py-2 rounded">
</div>

<div class="mb-3">
    <label class="block font-semibold">Keterangan:</label>
    <textarea name="keterangan" class="w-full border px-3 py-2 rounded"></textarea>
</div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Simpan</button>
    <a href="{{ route('payments.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
</form>

@endsection