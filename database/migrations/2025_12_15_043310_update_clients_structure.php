<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('clients', function (Blueprint $table) {

            // tambah kolom baru
            $table->date('tanggal_daftar')->nullable()->after('paket_id');
            $table->string('status')->default('aktif')->after('tanggal_daftar');

            // hapus kolom lama (jika ada)
            if (Schema::hasColumn('clients', 'harga')) {
                $table->dropColumn('harga');
            }

            if (Schema::hasColumn('clients', 'tagihan_per_bulan')) {
                $table->dropColumn('tagihan_per_bulan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {

            // rollback kolom baru
            $table->dropColumn(['tanggal_daftar', 'status']);

            // kembalikan kolom lama
            $table->decimal('harga', 12, 2)->nullable();
            $table->decimal('tagihan_per_bulan', 12, 2)->nullable();
        });
    }
};
