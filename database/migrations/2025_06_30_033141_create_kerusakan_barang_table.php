<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kerusakan_barang', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel asets
            $table->unsignedBigInteger('aset_id');
            $table->foreign('aset_id')->references('id')->on('asets')->onDelete('cascade');

            // Enum kondisi
            $table->enum('kondisi', ['baik', 'perbaikan', 'rusak ringan', 'rusak berat'])->default('rusak ringan');

            $table->text('deskripsi')->nullable();
            $table->integer('biaya_perbaikan')->nullable();
            $table->text('catatan_perbaikan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kerusakan_barang');
    }
};