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
        Schema::create('laporan_skpds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skpd_id')->constrained('skpds')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('lokasi_penggunaan', ['samsat_keliling', 'kantor', 'alat_berat']);
            $table->integer('penggunaan_set');
            $table->text('penggunaan_noseri');
            $table->integer('jumlah_rusak')->nullable();
            $table->text('rusak_noseri')->nullable();
            $table->integer('penambahan')->nullable();
            $table->text('penambahan_noseri')->nullable();
            $table->integer('jumlah_sisa_harian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_skpds');
    }
};
