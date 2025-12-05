<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('finance_report', function (Blueprint $table) {
            $table->id();
            $table->string('periode'); // Contoh: 2025-01
            $table->integer('saldo_awal')->default(0); // sisa bulan lalu
            $table->integer('pemasukan')->default(0); // total pembayaran masuk
            $table->integer('pengeluaran')->default(0);
            $table->integer('saldo_akhir')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_report');
    }
};
