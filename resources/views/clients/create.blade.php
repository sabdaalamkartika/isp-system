<!DOCTYPE html>
<html>
<head>
    <title>Tambah Client</title>
</head>
<body>

    <h1>Tambah Client</h1>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <label>Nama Client:</label><br>
        <input type="text" name="nama_client" required><br><br>

        <label>PPPoE Username:</label><br>
        <input type="text" name="username_pppoe" required><br><br>

        <label>Paket:</label><br>
        <input type="text" name="paket" required><br><br>

        <label>No Telp:</label><br>
        <input type="text" name="no_telp"><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <label>Tagihan Bulanan:</label><br>
        <input type="number" name="tagihan_per_bulan" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('clients.index') }}">← Kembali</a>

</body>
</html>
