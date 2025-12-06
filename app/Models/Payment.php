<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments'; // <-- sesuaikan nama tabel di DB

    protected $fillable = [
        'client_id',
        'tanggal_pembayaran',
        'nominal',
        'keterangan',
        'bulan',
        'tahun',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
