@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">

    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Master Paket</h1>
        <a href="{{ route('paket.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Paket
        </a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Nama Paket</th>
                <th class="p-3 text-left">Kecepatan</th>
                <th class="p-3 text-left">Harga</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pakets as $paket)
            <tr class="border-t">
                <td class="p-3">{{ $paket->nama_paket }}</td>
                <td class="p-3">{{ $paket->kecepatan }}</td>
                <td class="p-3">Rp {{ number_format($paket->harga,0,',','.') }}</td>
                <td class="p-3 text-center flex gap-2 justify-center">
                    <a href="{{ route('paket.edit',$paket->id) }}" class="text-blue-600">Edit</a>
                    <form method="POST" action="{{ route('paket.destroy',$paket->id) }}">
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
