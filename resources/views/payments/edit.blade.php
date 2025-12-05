<!DOCTYPE html>
<html>
<head>
    <title>Edit Pembayaran</title>
</head>
<body>

    <h1>Edit Pembayaran</h1>

    <a href="{{ route('clients.payments', $payment->client_id) }}">← Kembali </a>
    <br><br>

    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Client:</label><br>
        <input type="text" value="{{ $payment->client->nama_client }}" disabled>
        <br><br>

        <label>Tanggal Pembayaran:</label><br>
        <input type="date" name="tanggal_pembayaran" value="{{ $payment->tanggal_pembayaran }}" required>
        <br><br>

        <label>Nominal:</label><br>
        <input type="number" name="nominal" value="{{ $payment->nominal }}" required>
        <br><br>

        <label>Keterangan:</label><br>
        <input type="text" name="keterangan" value="{{ $payment->keterangan }}">
        <br><br>

        <button type="submit">Update Pembayaran</button>
    </form>

</body>
</html>
