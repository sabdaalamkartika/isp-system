<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index(Request $request)
    {
        // Ambil bulan dan tahun dari filter (default = bulan & tahun sekarang)
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        // ============================
        // 1. Saldo Bulan Lalu
        // ============================
        $total_pemasukan_lalu = Payment::where(function ($q) use ($bulan, $tahun) {
            if ($bulan == 1) {
                // Bulan Januari → semua sebelum tahun ini
                $q->whereYear('tanggal_pembayaran', '<', $tahun);
            } else {
                $q->whereYear('tanggal_pembayaran', '<=', $tahun)
                  ->whereMonth('tanggal_pembayaran', '<', $bulan);
            }
        })->sum('nominal');

        $total_pengeluaran_lalu = Pengeluaran::where(function ($q) use ($bulan, $tahun) {
            if ($bulan == 1) {
                $q->whereYear('tgl', '<', $tahun);
            } else {
                $q->whereYear('tgl', '<=', $tahun)
                  ->whereMonth('tgl', '<', $bulan);
            }
        })->sum('nominal');

        $saldo_bulan_lalu = $total_pemasukan_lalu - $total_pengeluaran_lalu;

        // ============================
        // 2. Pemasukan Bulan Ini
        // ============================
        $pemasukan_bulan_ini = Payment::whereYear('tanggal_pembayaran', $tahun)
            ->whereMonth('tanggal_pembayaran', $bulan)
            ->sum('nominal');

        // ============================
        // 3. Pengeluaran Bulan Ini
        // ============================
        $pengeluaran_bulan_ini = Pengeluaran::whereYear('tgl', $tahun)
            ->whereMonth('tgl', $bulan)
            ->sum('nominal');

        // ============================
        // 4. Saldo Bulan Ini
        // ============================
        $saldo_bulan_ini = $pemasukan_bulan_ini - $pengeluaran_bulan_ini;

        // ============================
        // 5. Total Saldo
        // ============================
        $total_saldo = $saldo_bulan_lalu + $saldo_bulan_ini;

        return view('finance.index', compact(
            'bulan',
            'tahun',
            'saldo_bulan_lalu',
            'pemasukan_bulan_ini',
            'pengeluaran_bulan_ini',
            'saldo_bulan_ini',
            'total_saldo'
        ));
    }
}
