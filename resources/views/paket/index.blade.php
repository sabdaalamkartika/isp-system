@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Master Paket</h1>

<a href="{{ route('paket.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Paket</a>

<div class="overflow-x-auto bg-white shadow rounded">
    <table class="w-full border border-gray-300 bg-white rounded shadow-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-3 py-2 text-left">Nama Paket</th>
                <th class="px-3 py-2 text-left">Kecepatan</th>
                <th class="p-3 text-left">Harga</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($pakets as $paket)
            <tr class="hover:bg-gray-50">
                <td class="p-3">{{ $paket->nama_paket }}</td>
                <td class="p-3">{{ $paket->kecepatan }}</td>
                <td class="p-3">Rp {{ number_format($paket->harga,0,',','.') }}</td>
                <td class="p-3 text-center space-x-2">
                    <a href="{{ route('paket.edit',$paket->id) }}" class="text-blue-600">Edit</a>
                    <form class="inline" method="POST" action="{{ route('paket.destroy',$paket->id) }}">
                        @csrf @method('DELETE')
                        <button class="text-red-600" onclick="return confirm('Hapus paket?')">
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
