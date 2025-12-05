<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        // total client
        $totalClients = Client::count();

        // total pemasukan bulan ini
        $paymentsThisMonth = Payment::whereMonth('tanggal_pembayaran', now()->month)
                                    ->whereYear('tanggal_pembayaran', now()->year)
                                    ->sum('nominal');

        // total billing = total payment bulan ini (sementara)
        $billingThisMonth = $paymentsThisMonth;

        // saldo keuangan = total seluruh pembayaran masuk
        $financeBalance = Payment::sum('nominal');

        return view('dashboard', compact(
            'totalClients',
            'paymentsThisMonth',
            'billingThisMonth',
            'financeBalance'
        ));
    }
}
