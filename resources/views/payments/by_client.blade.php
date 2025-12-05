<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran - {{ $client->nama_client }}</title>
</head>
<body>

    <h2>Riwayat Pembayaran: {{ $client->nama_client }}</h2>
    <p>PPPoE: {{ $client->username_pppoe }}</p>
    <p>Paket: {{ $client->paket }}</p>
    <hr>

    <a href="{{ route('payments.index') }}">← Kembali</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>Tanggal</th>
            <th>Nominal</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>

        @foreach($payments as $p)
        <tr>
            <td>{{ $p->tanggal_pembayaran }}</td>
            <td>{{ number_format($p->nominal) }}</td>
            <td>{{ $p->bulan }}</td>
            <td>{{ $p->tahun }}</td>
            <td>{{ $p->keterangan }}</td>
            <td>
                <!-- tombol edit payment -->

                <a href="{{ route('payments.edit', $p->id) }}">Edit</a>|
                <form action="{{ route('payments.destroy', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="client_id" value="{{ $p->client_id }}">
                    <button onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
                
            </td>
        </tr>
        @endforeach

    </table>

</body>
</html>
