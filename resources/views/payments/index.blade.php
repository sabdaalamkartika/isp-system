<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pembayaran Terbaru</title>
</head>
<body>

    <h1>Daftar Pembayaran Terbaru per Client</h1>

    <a href="{{ route('payments.create') }}">+ Tambah Pembayaran</a>
    <br>
    <br>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama Client</th>
            <th>Tanggal Pembayaran Terakhir</th>
            <th>Nominal</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>

        @foreach($payments as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->client->nama_client }}</td>
            <td>{{ $p->tanggal_pembayaran }}</td>
            <td>{{ number_format($p->nominal) }}</td>
            <td>{{ $p->keterangan }}</td>

            <td>

                <!-- tombol lihat semua pembayaran client -->
                <a href="/clients/{{ $p->client_id }}/payments">Lihat Pembayaran</a> 
                
                <!-- tombol tambah pembayaran -->
                <!-- <a href="{{ route('payments.create', $p->client_id) }}">Tambah Pembayaran</a> -->
            </td>
        </tr>
        @endforeach

    </table>
    <br>
    <a href="{{ route('dashboard') }}">← Kembali ke Dashboaard</a>

</body>
</html>

