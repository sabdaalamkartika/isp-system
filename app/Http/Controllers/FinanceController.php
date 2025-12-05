<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class FinanceController extends Controller
{
    public function index()
    {
        // total pemasukan
        $totalMasuk = Payment::sum('nominal');

        // contoh sisa saldo bulan sebelumnya & pengeluaran
        // untuk sekarang kita set manual dulu
        $sisaBulanLalu = 0;
        $pengeluaran = 0;

        $totalSaldo = $sisaBulanLalu + $totalMasuk - $pengeluaran;

        return view('finance.index', compact('totalMasuk', 'sisaBulanLalu', 'pengeluaran', 'totalSaldo'));
    }
}
