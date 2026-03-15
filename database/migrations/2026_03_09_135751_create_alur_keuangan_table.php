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
        Schema::create('alur_keuangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan', 250);
            $table->enum('status', ['pemasukan', 'pengeluaran']);
            $table->bigInteger('nominal');
            $table->date('tanggal_transaksi');
            $table->longText('deskripsi')->nullable();
            $table->string('file', 250);
            $table->enum('status_pembayaran', ['terbayar', 'belum_dibayar', 'ditunda']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alur_keuangan');
    }
};
