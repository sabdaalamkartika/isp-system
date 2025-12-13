@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto p-4">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">Laporan Keuangan</h1>

    <!-- FILTER -->
    <form method="GET" action="{{ route('finance.index') }}" class="mb-6 flex flex-wrap gap-4 items-end">
        <div>
            <label class="block text-gray-700 font-medium mb-1">Bulan:</label>
            <select name="bulan" class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @for ($b = 1; $b <= 12; $b++)
                    <option value="{{ $b }}" {{ $bulan == $b ? 'selected' : '' }}>
                        {{ $b }}
                    </option>
                @endfor
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Tahun:</label>
            <select name="tahun" class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @for ($t = 2020; $t <= date('Y'); $t++)
                    <option value="{{ $t }}" {{ $tahun == $t ? 'selected' : '' }}>
                        {{ $t }}
                    </option>
                @endfor
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Filter
        </button>
    </form>

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow">
            <tbody>
                <tr class="border-b border-gray-200">
                    <th class="text-left px-4 py-2 bg-gray-100">Saldo Bulan Lalu</th>
                    <td class="px-4 py-2">Rp {{ number_format($saldo_bulan_lalu) }}</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <th class="text-left px-4 py-2 bg-gray-100">Total Pemasukan Bulan Ini</th>
                    <td class="px-4 py-2">Rp {{ number_format($pemasukan_bulan_ini) }}</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <th class="text-left px-4 py-2 bg-gray-100">Total Pengeluaran Bulan Ini</th>
                    <td class="px-4 py-2">Rp {{ number_format($pengeluaran_bulan_ini) }}</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <th class="text-left px-4 py-2 bg-gray-100">Saldo Bulan Ini</th>
                    <td class="px-4 py-2">Rp {{ number_format($saldo_bulan_ini) }}</td>
                </tr>
                <tr>
                    <th class="text-left px-4 py-2 bg-gray-100">Total Saldo</th>
                    <td class="px-4 py-2 font-bold">Rp {{ number_format($total_saldo) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
