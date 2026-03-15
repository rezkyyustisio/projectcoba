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
        Schema::create('hutang_piutang', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['hutang', 'piutang']);
            $table->string('nama', 250);
            $table->bigInteger('jumlah');
            $table->date('tanggal');
            $table->date('tanggal_jatuh_tempo');
            $table->longText('deskripsi')->nullable();
            $table->enum('status', ['aktif', 'lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hutang_piutang');
    }
};
