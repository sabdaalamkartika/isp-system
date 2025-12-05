<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pembayaran</title>
</head>
<body>

<h2>Tambah Pembayaran</h2>

<form action="{{ route('payments.store') }}" method="POST">
    @csrf

    <label>Pilih Client:</label><br>
    <select name="client_id" required>
        <option value="">-- Pilih Client --</option>
        @foreach($clients as $c)
            <option value="{{ $c->id }}">{{ $c->nama_client }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Tanggal Pembayaran:</label><br>
    <input type="date" name="tanggal_pembayaran" required>
    <br><br>

    <label>Nominal:</label><br>
    <input type="number" name="nominal" required>
    <br><br>

    <label>Keterangan:</label><br>
    <textarea name="keterangan"></textarea>
    <br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>
