<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'pakets';

    protected $fillable = [
        'nama_paket',
        'kecepatan',
        'harga',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class, 'paket_id');
    }
}
