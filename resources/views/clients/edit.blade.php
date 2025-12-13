@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold  mb-4">Edit Client</h1>

    <form action="{{ route('clients.update', $client->id) }}" method="POST" class="bg-white p-6 rounded shadow w-full">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block font-semibold">Nama Client:</label>
            <input type="text" name="nama_client" value="{{ $client->nama_client }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">PPPoE Username:</label>
            <input type="text" name="username_pppoe" value="{{ $client->username_pppoe }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Paket:</label>
            <input type="text" name="paket" value="{{ $client->paket }}" required class=" w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">No Telp:</label>
            <input type="text" name="no_telp" value="{{ $client->no_telp }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Harga:</label>
            <input type="number" name="harga" value="{{ $client->harga }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Alamat:</label>
            <textarea name="alamat" required class="w-full border px-3 py-2 rounded">{{ $client->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Tagihan Bulanan:</label>
            <input type="number" name="tagihan_per_bulan" value="{{ $client->tagihan_per_bulan }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Update</button>

        <a href="{{ route('clients.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
    </form>

    
    

</body>
</html>

@endsection