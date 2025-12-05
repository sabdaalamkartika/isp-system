<!DOCTYPE html>
<html>
<head>
    <title>Data Clients</title>
</head>
<body>

    <h1>Daftar Client</h1>

    <a href="{{ route('clients.create') }}">+ Tambah Client</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama Client</th>
            <th>Username PPPoE</th>
            <th>Paket</th>
            <th>No Telp</th>
            <th>Alamat</th>
            <th>Harga</th>
            <th>Tagihan / Bulan</th>
            <th>Aksi</th>
        </tr>

        @foreach($clients as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nama_client }}</td>
            <td>{{ $c->username_pppoe }}</td>
            <td>{{ $c->paket }}</td>
            <td>{{ $c->no_telp }}</td>
            <td>{{ $c->alamat }}</td>
            <td>{{ $c->harga }}</td>
            <td>{{ $c->tagihan_per_bulan }}</td>
            <td>
                <a href="{{ route('clients.edit', $c->id) }}">Edit</a> |
                <form action="{{ route('clients.destroy', $c->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
    <a href="{{ route('dashboard') }}">← Kembali ke Dashboaard</a>

</body>
</html>
