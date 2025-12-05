<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        // validasi sederhana (sesuaikan bila perlu)
        $request->validate([
            'nama_client' => 'required|string|max:255',
            'username_pppoe' => 'required|string|max:255',
            'paket' => 'required|string|max:255',
            'no_telp' => 'required|string|max:50',
            'harga' => 'required|numeric',
            'alamat' => 'required|string',
            'tagihan_per_bulan' => 'required|numeric',
        ]);

        // Buat object Client secara manual (tidak menggunakan mass-assignment)
        $client = new \App\Models\Client();

        $client->nama_client = $request->input('nama_client');
        $client->username_pppoe = $request->input('username_pppoe');
        $client->paket = $request->input('paket');
        $client->no_telp = $request->input('no_telp');
        $client->harga = $request->input('harga');
        $client->alamat = $request->input('alamat');
        $client->tagihan_per_bulan = $request->input('tagihan_per_bulan');

        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client berhasil ditambahkan.');
        

    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $client->nama_client = $request->nama_client;
        $client->username_pppoe = $request->username_pppoe;
        $client->paket = $request->paket;
        $client->no_telp = $request->no_telp;
        $client->alamat = $request->alamat;
        $client->harga = $request->harga;
        $client->tagihan_per_bulan = $request->tagihan_per_bulan;

        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client berhasil diupdate.');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client berhasil dihapus.');
    }


}
