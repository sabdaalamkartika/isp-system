@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold mb-4">Daftar Pengeluaran</h1>

    <a href="{{ route('pengeluaran.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Pengeluaran</a>
    <br><br>

<div class="overflow-x-auto bg-white shadow rounded">
    <table class="w-full border-collapse">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">ID</th>
                <th class="border px-3 py-2">Deskripsi</th>
                <th class="border px-3 py-2">Tanggal</th>
                <th class="border px-3 py-2">Penanggung Jawab</th>
                <th class="border px-3 py-2">Nominal</th>
                <th class="border px-3 py-2">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $p)
            <tr class="hover:bg-gray-50">
                <td class="border px-3 py-2">{{ $p->id }}</td>
                <td class="border px-3 py-2">{{ $p->deskripsi }}</td>
                <td class="border px-3 py-2">{{ $p->tgl }}</td>
                <td class="border px-3 py-2">{{ $p->pj }}</td>
                <td class="border px-3 py-2">{{ number_format($p->nominal) }}</td>
                <td class="px-3 py-2 flex gap-2">
                    <a href="{{ route('pengeluaran.edit', $p->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

                    <form action="{{ route('pengeluaran.destroy', $p->id) }}" method="POST"
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