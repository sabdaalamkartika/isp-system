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

        {{-- <div class="mb-3">
            <label class="block font-semibold">Paket:</label>
            <input type="text" name="paket" value="{{ $client->paket }}" required class=" w-full border px-3 py-2 rounded">
        </div> --}}

        {{-- <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Paket
            </label>

            <select name="paket_id"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm">

                <option value="">-- Pilih Paket --</option>

                @foreach ($pakets as $paket)
                    <option value="{{ $paket->id }}"
                        {{ $client->paket_id == $paket->id ? 'selected' : '' }}>
                        {{ $paket->nama_paket }} ({{ $paket->kecepatan }}) -
                        Rp {{ number_format($paket->harga, 0, ',', '.') }}
                    </option>
                @endforeach

            </select>
        </div> --}}

         <!-- Paket -->
        <div>
            <label class="block text-sm font-medium">Paket</label>
            <select name="paket_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Paket --</option>
                @foreach($pakets as $paket)
                    <option value="{{ $paket->id }}"
                        {{ $client->paket_id == $paket->id ? 'selected' : '' }}>
                        {{ $paket->nama_paket }} ({{ $paket->kecepatan }} Mbps)
                    </option>
                @endforeach
            </select>
        </div>

         <!-- Status -->
        <div>
            <label class="block text-sm font-medium">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="aktif" {{ $client->status == 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="nonaktif" {{ $client->status == 'nonaktif' ? 'selected' : '' }}>
                    Non Aktif
                </option>
            </select>
        </div>


        <div class="mb-3">
            <label class="block font-semibold">No Telp:</label>
            <input type="text" name="no_telp" value="{{ $client->no_telp }}" class="w-full border px-3 py-2 rounded">
        </div>

        {{-- <div class="mb-3">
            <label class="block font-semibold">Harga:</label>
            <input type="number" name="harga" value="{{ $client->harga }}" required class="w-full border px-3 py-2 rounded">
        </div> --}}

        <div class="mb-3">
            <label class="block font-semibold">Alamat:</label>
            <textarea name="alamat" class="w-full border px-3 py-2 rounded">{{ $client->alamat }}</textarea>
        </div>

        {{-- <div class="mb-3">
            <label class="block font-semibold">Tagihan Bulanan:</label>
            <input type="number" name="tagihan_per_bulan" value="{{ $client->tagihan_per_bulan }}" required class="w-full border px-3 py-2 rounded">
        </div> --}}

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Tanggal Daftar
            </label>

            <input
                type="date"
                name="tanggal_daftar"
                value="{{ old('tanggal_daftar', $client->tanggal_daftar) }}"
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>



        <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Update</button>

        <a href="{{ route('clients.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
    </form>

    
    

</body>
</html>

@endsection