<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Paket;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('paket')->get();
        return view('clients.index', compact('clients'));
    }


    public function create()
    {
        $pakets = Paket::orderBy('nama_paket')->get();
        return view('clients.create', compact('pakets'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_client' => 'required|string|max:255',
            'username_pppoe' => 'required|string|max:255|unique:clients,username_pppoe',
            'paket_id' => 'required|exists:pakets,id',
            'tanggal_daftar' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
            'no_telp' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
        ]);


        Client::create([
            'nama_client' => $request->nama_client,
            'username_pppoe' => $request->username_pppoe,
            'paket_id' => $request->paket_id,
            'tanggal_daftar' => $request->tanggal_daftar,
            'status' => $request->status,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);


        return redirect()
            ->route('clients.index')
            ->with('success', 'Client berhasil ditambahkan');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $pakets = Paket::all();

        return view('clients.edit', compact('client', 'pakets'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'nama_client' => 'required|string|max:255',
            'username_pppoe' => 'required|string|max:255|unique:clients,username_pppoe,' . $id,
            'paket_id' => 'required|exists:pakets,id',
            'tanggal_daftar' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
            'no_telp' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
        ]);


        $client->nama_client = $request->nama_client;
        $client->username_pppoe = $request->username_pppoe;
        $client->paket_id = $request->paket_id;
        $client->status = $request->status;
        $client->tanggal_daftar = $request->tanggal_daftar;
        $client->no_telp = $request->no_telp;
        $client->alamat = $request->alamat;

        $client->save();


        return redirect()
            ->route('clients.index')
            ->with('success', 'Client berhasil diupdate');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client berhasil dihapus');
    }
}
