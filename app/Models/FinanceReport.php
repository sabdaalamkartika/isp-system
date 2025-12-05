<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinanceReport extends Model
{
    protected $fillable = [
        'periode',
        'saldo_awal',
        'pemasukan',
        'pengeluaran',
        'saldo_akhir',
    ];
}
