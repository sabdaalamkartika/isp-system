@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Client</h1>

<a href="{{ route('clients.create') }}"
   class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
    + Tambah Client
</a>

<div class="overflow-x-auto bg-white shadow rounded">
    <table class="w-full border-collapse">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">ID</th>
                <th class="border px-3 py-2">Nama</th>
                <th class="border px-3 py-2">Username PPPoE</th>
                <th class="border px-3 py-2">Paket</th>
                <th class="border px-3 py-2">Telp</th>
                <th class="border px-3 py-2">Alamat</th>
                <th class="border px-3 py-2">Harga</th>
                <th class="border px-3 py-2">Tagihan</th>
                <th class="border px-3 py-2">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($clients as $c)
                <tr class="hover:bg-gray-50">
                    <td class="border px-3 py-2">{{ $c->id }}</td>
                    <td class="border px-3 py-2">{{ $c->nama_client }}</td>
                    <td class="border px-3 py-2">{{ $c->username_pppoe }}</td>
                    <td class="border px-3 py-2">{{ $c->paket }}</td>
                    <td class="border px-3 py-2">{{ $c->no_telp }}</td>
                    <td class="border px-3 py-2">{{ $c->alamat }}</td>
                    <td class="border px-3 py-2">{{ $c->harga }}</td>
                    <td class="border px-3 py-2">{{ $c->tagihan_per_bulan }}</td>
                    <td class="border px-3 py-2 flex gap-2">

                        <a href="{{ route('clients.edit', $c->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded">
                            Edit
                        </a>

                        <form action="{{ route('clients.destroy', $c->id) }}" method="POST"
                              onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
