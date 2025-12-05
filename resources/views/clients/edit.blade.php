<!DOCTYPE html>
<html>
<head>
    <title>Edit Client</title>
</head>
<body>

    <h1>Edit Client</h1>

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Client:</label><br>
        <input type="text" name="nama_client" value="{{ $client->nama_client }}" required><br><br>

        <label>PPPoE Username:</label><br>
        <input type="text" name="username_pppoe" value="{{ $client->username_pppoe }}" required><br><br>

        <label>Paket:</label><br>
        <input type="text" name="paket" value="{{ $client->paket }}" required><br><br>

        <label>No Telp:</label><br>
        <input type="text" name="no_telp" value="{{ $client->no_telp }}"><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="{{ $client->harga }}" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required>{{ $client->alamat }}</textarea><br><br>

        <label>Tagihan Bulanan:</label><br>
        <input type="number" name="tagihan_per_bulan" value="{{ $client->tagihan_per_bulan }}" required><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('clients.index') }}">← Kembali</a>

</body>
</html>
