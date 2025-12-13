@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold bb-4">Edit Pembayaran</h1>

    <a href="{{ route('clients.payments', $payment->client_id) }}">← Kembali </a>
    <br><br>

    <form action="{{ route('payments.update', $payment->id) }}" method="POST"
    class="bg-white p-6 rounded shadow w-full">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block font-semibold">Nama Client:</label>
            <input type="text" value="{{ $payment->client->nama_client }}" disabled class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Tanggal Pembayaran:</label>
            <input type="date" name="tanggal_pembayaran" value="{{ $payment->tanggal_pembayaran }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Nominal:</label>
            <input type="number" name="nominal" value="{{ $payment->nominal }}" required class="w-full border px-3 py-2 rounded">
        </div>
        
        <div class="mb-3">
            <label class="block font-semibold">Keterangan:</label>
            <input type="text" name="keterangan" value="{{ $payment->keterangan }}"
            class="w-full border px-3 py-2 rounded">
        </div>    

        <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Update</button>

        <a href="{{ route('clients.payments',$payment->client_id) }}" 
        class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
        Batal
        </a>
    </form>

@endsection
