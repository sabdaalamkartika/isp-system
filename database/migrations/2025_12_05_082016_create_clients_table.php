<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nama_client');
            $table->string('username_pppoe')->unique();
            $table->string('paket')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('harga')->default(0);
            $table->integer('tagihan_per_bulan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
