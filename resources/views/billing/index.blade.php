<!DOCTYPE html>
<html>
<head>
    <title>Laporan Billing</title>
</head>
<body>

    <h1>Laporan Billing</h1>

    <!-- FILTER -->
    <form method="GET" action="{{ route('billing.index') }}">
        <label>Bulan:</label>
        <select name="bulan">
            <option value="">Semua</option>
            @for ($b = 1; $b <= 12; $b++)
                <option value="{{ $b }}" {{ request('bulan') == $b ? 'selected' : '' }}>
                    {{ $b }}
                </option>
            @endfor
        </select>

        <label>Tahun:</label>
        <select name="tahun">
            <option value="">Semua</option>
            @for ($t = 2020; $t <= date('Y'); $t++)
                <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>
                    {{ $t }}
                </option>
            @endfor
        </select>

        <button type="submit">Filter</button>
    </form>

    <br>

    <!-- TABEL DETAIL PEMBAYARAN -->
    <table border="1" cellpadding="8">
        <tr>
            <th>Nama Client</th>
            <th>Paket</th>
            <th>Tanggal Pembayaran</th>
            <th>Nominal</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Keterangan</th>
        </tr>

        @forelse($billing as $b)
        <tr>
            <td>{{ $b->client->nama_client ?? '-' }}</td>
            <td>{{ $b->client->paket ?? '-' }}</td>
            <td>{{ $b->tanggal_pembayaran }}</td>
            <td>{{ number_format($b->nominal) }}</td>
            <td>{{ $b->bulan }}</td>
            <td>{{ $b->tahun }}</td>
            <td>{{ $b->keterangan }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" style="text-align:center;">Tidak ada data</td>
        </tr>
        @endforelse
    </table>

    <h2>Total Pendapatan: Rp {{ number_format($total) }}</h2>

</body>
</html>
