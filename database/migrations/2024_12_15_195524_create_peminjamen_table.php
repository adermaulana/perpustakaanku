<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota');
            $table->foreignId('id_buku');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_rencana_pengembalian')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->string('status')->default('dipinjam');
            $table->timestamps();

            $table->foreign('id_anggota')->references('id')->on('anggotas')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('bukus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
