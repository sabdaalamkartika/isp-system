<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Form tambah pembayaran
    public function create()
    {
        $clients = Client::orderBy('nama_client')->get();

        return view('payments.create', compact('clients'));
    }

    // Simpan pembayaran
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'tanggal_pembayaran' => 'required|date',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        // Ambil semua input
        $requestData = $request->all();

        // Tambahkan bulan & tahun otomatis dari tanggal pembayaran
        $requestData['bulan'] = date('m', strtotime($request->tanggal_pembayaran));
        $requestData['tahun'] = date('Y', strtotime($request->tanggal_pembayaran));

        // Simpan ke database
        Payment::create($requestData);

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    // List semua pembayaran
    public function index(Request $request)
    {
        // Ambil filter bulan & tahun (jika ada)
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        // Query dasar
        $query = Payment::with('client')
            ->orderBy('tanggal_pembayaran', 'desc');

        // Terapkan filter jika dipilih
        if ($bulan) {
            $query->whereMonth('tanggal_pembayaran', $bulan);
        }

        if ($tahun) {
            $query->whereYear('tanggal_pembayaran', $tahun);
        }

        // Ambil hanya pembayaran terbaru per client
        $payments = $query->get()
                    ->unique('client_id')
                    ->values();

        // Hitung total pemasukan berdasarkan filter
        $total_pemasukan = $query->sum('nominal');

        return view('payments.index', compact('payments', 'bulan', 'tahun', 'total_pemasukan'));
    }

    public function showByClient($id)
    {
        $client = Client::findOrFail($id);
        $payments = Payment::where('client_id', $id)->orderBy('tanggal_pembayaran', 'desc')->get();

        return view('payments.by_client', compact('client', 'payments'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $client = $payment->client; // ambil data client terkait

        return view('payments.edit', compact('payment', 'client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pembayaran' => 'required|date',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $payment = Payment::findOrFail($id);

        // Ambil input
        $data = $request->all();

        // Update bulan & tahun otomatis
        $data['bulan'] = date('m', strtotime($request->tanggal_pembayaran));
        $data['tahun'] = date('Y', strtotime($request->tanggal_pembayaran));

        // Simpan perubahan
        $payment->update($data);

        return redirect()->route('clients.payments', $payment->client_id)->with('success', 'Pembayaran berhasil diperbarui.');

        // return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $client_id = $request->client_id;
        $payment->delete();

        if ($client_id) {
            return redirect()
                ->route('clients.payments', $client_id)
                ->with('succes', 'Pembayaran berhasil dihapus');
        }

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
