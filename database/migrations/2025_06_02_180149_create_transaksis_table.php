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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_mitra')->constrained('mitra', 'id_mitra');
            $table->date('tanggal_transaksi');
            $table->enum('jenis_transaksi', ['penjualan', 'pembelian']);
            $table->foreignId('id_sayur')->constrained('sayur', 'id_sayur');
            $table->decimal('kuantitas', 10, 1);
            $table->decimal('harga_satuan', 12, 0);
            $table->decimal('total_transaksi', 15, 2);
            $table->enum('jenis_pembayaran', ['tunai', 'hutang']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
