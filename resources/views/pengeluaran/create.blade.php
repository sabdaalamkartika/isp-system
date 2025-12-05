<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengeluaran</title>
</head>
<body>

    <h1>Tambah Pengeluaran</h1>

    <form action="{{ route('pengeluaran.store') }}" method="POST">
        @csrf

        <label>Deskripsi:</label><br>
        <input type="text" name="deskripsi" required><br><br>

        <label>Tanggal:</label><br>
        <input type="date" name="tgl" required><br><br>

        <label>Penanggung Jawab:</label><br>
        <input type="text" name="pj" required><br><br>

        <label>Nominal:</label><br>
        <input type="number" name="nominal" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('pengeluaran.index') }}">← Kembali</a>

</body>
</html>
