@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Daftar Pembayaran Terbaru per Client</h1>

<a href="{{ route('payments.create') }}"
    class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
    + Tambah Pembayaran
</a>

<form method="GET" action="{{ route('payments.index') }}" class="w-full mb-6 flex flex-col md:flex-row md:items-end gap-4">

    <!-- Bulan -->
    <div class="w-full md:w-1/3">
        <label for="bulan" class="block mb-1 font-medium">Bulan</label>
        <select name="bulan"
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-300">
            <option value="">-- Semua --</option>
            @for($i = 1; $i <= 12; $i++)
                <option value="{{ sprintf('%02d', $i) }}"
                    {{ (isset($bulan) && $bulan == sprintf('%02d', $i)) ? 'selected' : '' }}>
                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                </option>
            @endfor
        </select>
    </div>

    <!-- Tahun -->
    <div class="w-full md:w-1/3">
        <label for="tahun" class="block mb-1 font-medium">Tahun</label>
        <select name="tahun"
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-300">
            <option value="">-- Semua --</option>
            @for($t = 2020; $t <= date('Y'); $t++)
                <option value="{{ $t }}" {{ (isset($tahun) && $tahun == $t) ? 'selected' : '' }}>
                    {{ $t }}
                </option>
            @endfor
        </select>
    </div>

    <!-- Button -->
    <div class="w-full md:w-auto">
        <button type="submit"
                class="w-full md:w-auto bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Filter
        </button>
    </div>

</form>


<div class="overflow-x-auto bg-white shadow rounded">
    <table class="w-full border-collapse">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">ID</th>
                <th class="border px-3 py-2">Nama Client</th>
                <th class="border px-3 py-2">Paket</th>
                <th class="border px-3 py-2">Tanggal Pembayaran Terakhir</th>
                <th class="border px-3 py-2">Nominal</th>
                <th class="border px-3 py-2">Keterangan</th>
                <th class="border px-3 py-2">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($payments as $p)
            <tr class="hover:bg-gray-50">
                <td class="border px-3 py-2">{{ $p->id }}</td>
                <td class="border px-3 py-2">{{ $p->client->nama_client }}</td>
                <td class="border px-3 py-2">{{ $p->client->paket ?? '-' }}</td>
                <td class="border px-3 py-2">{{ $p->tanggal_pembayaran }}</td>
                <td class="border px-3 py-2">{{ number_format($p->nominal) }}</td>
                <td class="border px-3 py-2">{{ $p->keterangan }}</td>
                <td class="border px-3 py-2">
                    <a href="/clients/{{ $p->client_id }}/payments"
                    class="bg-green-500 text-white px-3 py-1 rounded"
                    >Detail</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="bg-green-50 border-l-4 border-green-600 p-3 rounded mb-4">
    <h3 class="text-lg font-semibold text-green-700">
        Total Pemasukan  :
        <span class="font-bold">
            Rp {{ number_format($total_pemasukan, 0, ',', '.') }}
        </span>
    </h3>
</div>

@endsection
