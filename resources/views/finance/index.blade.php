<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan</title>
</head>
<body>

<h1>Laporan Keuangan</h1>

<!-- FILTER -->
<form method="GET" action="{{ route('finance.index') }}">
    <label>Bulan:</label>
    <select name="bulan">
        @for ($b = 1; $b <= 12; $b++)
            <option value="{{ $b }}" {{ $bulan == $b ? 'selected' : '' }}>
                {{ $b }}
            </option>
        @endfor
    </select>

    <label>Tahun:</label>
    <select name="tahun">
        @for ($t = 2020; $t <= date('Y'); $t++)
            <option value="{{ $t }}" {{ $tahun == $t ? 'selected' : '' }}>
                {{ $t }}
            </option>
        @endfor
    </select>

    <button type="submit">Filter</button>
</form>

<br>

<table border="1" cellpadding="8">
    <tr>
        <th>Saldo Bulan Lalu</th>
        <td>Rp {{ number_format($saldo_bulan_lalu) }}</td>
    </tr>

    <tr>
        <th>Total Pemasukan Bulan Ini</th>
        <td>Rp {{ number_format($pemasukan_bulan_ini) }}</td>
    </tr>

    <tr>
        <th>Total Pengeluaran Bulan Ini</th>
        <td>Rp {{ number_format($pengeluaran_bulan_ini) }}</td>
    </tr>

    <tr>
        <th>Saldo Bulan Ini</th>
        <td>Rp {{ number_format($saldo_bulan_ini) }}</td>
    </tr>

    <tr>
        <th>Total Saldo</th>
        <td><b>Rp {{ number_format($total_saldo) }}</b></td>
    </tr>
</table>

<br>
<a href="{{ route('dashboard') }}">← Kembali ke Dashboard</a>

</body>
</html>
