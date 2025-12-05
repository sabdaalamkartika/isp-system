<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    //list semua data paengeluaran
    public function index()
    {
        $data = Pengeluaran::orderBy('tgl', 'desc')->get();
        return view('pengeluaran.index', compact('data'));
    }

    // form tambah pengeluaran
    public function create()
    {
        return view('pengeluaran.create');
    }

    //proses simpan pengeluaran baru
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'tgl' => 'required|date',
            'pj' => 'required',
            'nominal' => 'required|numeric',
        ]);

        Pengeluaran::create([
            'deskripsi' => $request->deskripsi,
            'tgl' => $request->tgl,
            'pj' => $request-> pj,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('pengeluaran.index')->with('succes','Pengeluaran berhasil ditambahkan');

    }

    public function edit($id)
{
    $data = Pengeluaran::findOrFail($id);
    return view('pengeluaran.edit', compact('data'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'tgl'       => 'required|date',
            'pj'        => 'required',
            'nominal'   => 'required|numeric'
        ]);

        $data = Pengeluaran::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('pengeluaran.index');
    }

    public function destroy($id)
    {
        $data = Pengeluaran::findOrFail($id);
        $data->delete();

        return redirect()->route('pengeluaran.index');
    }

}


