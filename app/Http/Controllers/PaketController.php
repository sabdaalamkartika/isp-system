<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'kecepatan' => 'required',
            'harga' => 'required|numeric',
        ]);

        Paket::create($request->all());

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'kecepatan'  => 'required|string|max:50',
            'harga'      => 'required|numeric',
        ]);

        $paket = Paket::findOrFail($id);
        $paket->nama_paket = $request->nama_paket;
        $paket->kecepatan  = $request->kecepatan;
        $paket->harga      = $request->harga;
        $paket->save();

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil diperbarui');
    }

    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);

        // Cegah hapus jika masih dipakai client
        if ($paket->clients()->count() > 0) {
            return redirect()->route('paket.index')
                ->with('error', 'Paket tidak bisa dihapus karena masih digunakan client');
        }

        $paket->delete();

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil dihapus');
    }
}
