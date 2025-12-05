<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h1>Dashboard BRAYY</h1>
    <p>Menu a bersamamu:</p>

    <ul>
        <li><a href="{{ route('clients.index') }}">📌 Data Client</a></li>
        <li><a href="{{ route('payments.index') }}">💰 Data Pembayaran</a></li>
        <li><a href="/pengeluaran">💸 Pengluaran</a></li>
        <li><a href="{{ route('billing.index') }}">📉 Laporan Billing</a></li>
        <li><a href="/finance">📊 Finance / Laporan Keuangan</a></li>
    </ul>

</body>
</html>
