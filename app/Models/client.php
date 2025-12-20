<?php

namespace App\Models;

use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = [
        'nama_client',
        'username_pppoe',
        'paket_id',
        'tanggal_daftar',
        'status',
        'no_telp',
        'alamat',
    ];


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
