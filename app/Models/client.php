<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = [
    'nama_client',
    'username_pppoe',
    'paket',
    'no_telp',
    'alamat',
    'harga',
    'tagihan_per_bulanan'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
