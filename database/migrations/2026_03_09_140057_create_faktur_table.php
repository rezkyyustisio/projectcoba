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
        Schema::create('faktur', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_faktur', 200);
            $table->string('judul', 250);
            $table->date('tanggal');
            $table->date('tanggal_jatuh_tempo');
            $table->string('tipe_pembayaran', 100);
            $table->string('nama_perusahaan', 250);
            $table->string('logo_perusahaan', 250);
            $table->longText('alamat_perusahaan');
            $table->string('penerima_faktur', 250);
            $table->longText('alamat_penerima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur');
    }
};
