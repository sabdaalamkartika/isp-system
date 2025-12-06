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

    <form method="GET" action="{{ route('payments.index') }}" style="margin-bottom: 20px;">
    <label for="bulan">Bulan:</label>
    <select name="bulan">
        <option value="">-- Semua --</option>
        @for($i = 1; $i <= 12; $i++)
            <option value="{{ sprintf('%02d', $i) }}" 
                {{ (isset($bulan) && $bulan == sprintf('%02d', $i)) ? 'selected' : '' }}>
                {{ DateTime::createFromFormat('!m', $i)->format('F') }}
            </option>
        @endfor
    </select>

    <label for="tahun">Tahun:</label>
    <select name="tahun">
        <option value="">-- Semua --</option>
        @for($t = 2020; $t <= date('Y'); $t++)
            <option value="{{ $t }}" {{ (isset($tahun) && $tahun == $t) ? 'selected' : '' }}>
                {{ $t }}
            </option>
        @endfor
    </select>

    <button type="submit">Filter</button>
</form>


    <br>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama Client</th>
            <th>Paket</th>
            <th>Tanggal Pembayaran Terakhir</th>
            <th>Nominal</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>

        @foreach($payments as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->client->nama_client }}</td>
            <td>{{ $p->client->paket ?? '-' }}</td>
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
    <h3>Total Pemasukan by filter : Rp {{ number_format($total_pemasukan, 0, ',', '.') }}</h3>

    <br>
    <a href="{{ route('dashboard') }}">← Kembali ke Dashboaard</a>

</body>
</html>

