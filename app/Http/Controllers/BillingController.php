<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class BillingController extends Controller
{
    public function index(Request $request)
    {
        $query = Payment::with('client');

        // Filter bulan
        if ($request->bulan) {
            $query->where('bulan', $request->bulan);
        }

        // Filter tahun
        if ($request->tahun) {
            $query->where('tahun', $request->tahun);
        }

        $billing = $query->orderBy('tahun', 'desc')
                        ->orderBy('bulan', 'desc')
                        ->get();

        // Hitung total uang masuk
        $total = $billing->sum('nominal');

        return view('billing.index', compact('billing', 'total'));
    }
}
