<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan</title>
</head>
<body>

    <h1>Laporan Keuangan</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>Total Saldo Bulan Lalu</th>
            <td>{{ $sisaBulanLalu }}</td>
        </tr>
        <tr>
            <th>Total Pemasukan Bulan Ini</th>
            <td>{{ $totalMasuk }}</td>
        </tr>
        <tr>
            <th>Total Pengeluaran</th>
            <td>{{ $pengeluaran }}</td>
        </tr>
        <tr>
            <th>Total Saldo</th>
            <td>{{ $totalSaldo }}</td>
        </tr>
    </table>

    <br>
    <a href="{{ route('dashboard') }}">← Kembali ke Dashboaard</a>

</body>
</html>
