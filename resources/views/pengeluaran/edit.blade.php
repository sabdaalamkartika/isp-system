<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengeluaran</title>
</head>
<body>

    <h1>Edit Pengeluaran</h1>

    <form action="{{ route('pengeluaran.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Deskripsi:</label><br>
        <input type="text" name="deskripsi" value="{{ $data->deskripsi }}" required><br><br>

        <label>Tanggal:</label><br>
        <input type="date" name="tgl" value="{{ $data->tgl }}" required><br><br>

        <label>Penanggung Jawab:</label><br>
        <input type="text" name="pj" value="{{ $data->pj }}" required><br><br>

        <label>Nominal:</label><br>
        <input type="number" name="nominal" value="{{ $data->nominal }}" required><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('pengeluaran.index') }}">← Kembali</a>

</body>
</html>
