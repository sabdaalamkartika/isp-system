@extends('layouts.app')

@section('content')

    <h2 class="text-2xl font-bold mb-4">Riwayat Pembayaran </h2>
    <a href="{{ route('payments.index') }}">Kembali</a>
    <div class="bg-white px-3 py-2 rounded shadow my-4 border max-w-lg">
        <h2 class="text-xl font-semibold mb-4">Informasi Client</h2>

        <div class="space-y-3 text-gray-700">
            <div class="flex">
                <div class="w-32 font-semibold">Nama</div>
                <div>: {{ $client->nama_client }}</div>
            </div>

            <div class="flex">
                <div class="w-32 font-semibold">PPPoE</div>
                <div>: {{ $client->username_pppoe }}</div>
            </div>

            <div class="flex">
                <div class="w-32 font-semibold">Paket</div>
                <div>: {{ $client->paket }}</div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2">Tanggal</th>
                    <th class="border px-3 py-2">Nominal</th>
                    <th class="border px-3 py-2">Bulan</th>
                    <th class="border px-3 py-2">Tahun</th>
                    <th class="border px-3 py-2">Keterangan</th>
                    <th class="border px-3 py-2">Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($payments as $p)
                <tr class="hover:bg-gray-50">
                    <td class="border px-3 py-2">{{ $p->tanggal_pembayaran }}</td>
                    <td class="border px-3 py-2">{{ number_format($p->nominal) }}</td>
                    <td class="border px-3 py-2">{{ $p->bulan }}</td>
                    <td class="border px-3 py-2">{{ $p->tahun }}</td>
                    <td class="border px-3 py-2">{{ $p->keterangan }}</td>
                    <td class="border px-3 py-2 flex gap-2">

                        <a href="{{ route('payments.edit', $p->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit

                        </a>
                        <form action="{{ route('payments.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="client_id" value="{{ $p->client_id }}">
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                        </form>
                        {{-- <form action="{{ route('payments.destroy', $p->id) }}" method="POST"
                              onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection