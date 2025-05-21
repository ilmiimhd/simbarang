<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kerusakan_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->string('jenis_barang'); // tetap / habis_pakai
            $table->enum('kondisi', ['baik', 'rusak', 'perbaikan'])->default('rusak');
            $table->text('deskripsi');
            $table->string('foto_rusak')->nullable();
            $table->integer('biaya_perbaikan')->nullable();
            $table->text('catatan_perbaikan')->nullable();
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kerusakan_barang');
    }
};
