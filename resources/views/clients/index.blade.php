@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Client</h1>

<a href="{{ route('clients.create') }}"
   class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
    + Tambah Client
</a>

<div class="overflow-x-auto bg-white shadow rounded">
    <table class="w-full border border-gray-300 bg-white rounded shadow-sm">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-3 py-2 border">Nama</th>
            <th class="px-3 py-2 border">PPPoE</th>
            <th class="px-3 py-2 border">Paket</th>
            <th class="px-3 py-2 border">Alamat</th>
            <th class="px-3 py-2 border">No Tlp</th>
            <th class="px-3 py-2 border">Status</th>
            <th class="px-3 py-2 border">Tgl Daftar</th>
            <th class="px-3 py-2 border text-center">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($clients as $client)
        <tr class="hover:bg-gray-50">
            <td class="px-3 py-2 border">
                {{ $client->nama_client }}
            </td>

            <td class="px-3 py-2 border">
                {{ $client->username_pppoe }}
            </td>

            <td class="px-3 py-2 border">
                @if($client->paket)
                    <div class="">
                        {{ $client->paket->nama_paket }}
                    </div>
                    <div class="text-sm text-gray-500">
                        Rp {{ number_format($client->paket->harga, 0, ',', '.') }}
                    </div>
                @else
                    <span class="text-red-500 text-sm">Belum ada paket</span>
                @endif
            </td>

            <td class="px-3 py-2 border">
                {{ $client->alamat }}
            </td>

            <td class="px-3 py-2 border">
                {{ $client->no_telp }}
            </td>

            <td class="px-3 py-2 border text-center">
                @if($client->status === 'aktif')
                    <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                        Aktif
                    </span>
                @else
                    <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                        Nonaktif
                    </span>
                @endif
            </td>

            <td class="px-3 py-2 border text-center">
                {{ \Carbon\Carbon::parse($client->tanggal_daftar)->format('d M Y') }}
            </td>

            <td class="px-3 py-2 border text-center space-x-2">
                <a href="{{ route('clients.edit', $client->id) }}"
                   class="text-blue-600 hover:underline">
                    Edit
                </a>

                <form action="{{ route('clients.destroy', $client->id) }}"
                      method="POST"
                      class="inline">
                    @csrf
                    @method('DELETE')
                    <button
                        onclick="return confirm('Yakin hapus client?')"
                        class="text-red-600 hover:underline">
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
