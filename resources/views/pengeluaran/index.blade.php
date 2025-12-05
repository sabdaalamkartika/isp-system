<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengeluaran</title>
</head>
<body>

    <h1>Daftar Pengeluaran</h1>

    <a href="{{ route('pengeluaran.create') }}">+ Tambah Pengeluaran</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Penanggung Jawab</th>
            <th>Nominal</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->deskripsi }}</td>
            <td>{{ $p->tgl }}</td>
            <td>{{ $p->pj }}</td>
            <td>{{ number_format($p->nominal) }}</td>
            <td>
                <a href="{{ route('pengeluaran.edit', $p->id) }}">Edit</a>

                <form action="{{ route('pengeluaran.destroy', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    <br>
    <a href="{{ route('dashboard') }}">← Kembali ke Dashboaard</a>
</body>
</html>
