<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_aset');
            $table->string('no_reg')->nullable();
            $table->string('merk_type')->nullable();
            $table->string('ukuran_cc')->nullable();
            $table->string('bahan')->nullable();
            $table->integer('tahun_pembelian')->nullable();
            $table->string('nomor_pabrik')->nullable();
            $table->string('nomor_rangka')->nullable();
            $table->string('nomor_mesin')->nullable();
            $table->string('nomor_polisi')->nullable();
            $table->string('nomor_bpkb')->nullable();
            $table->string('asal_usul')->nullable();
            $table->bigInteger('harga_satuan')->nullable();
            $table->string('keberadaan')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('paraf')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};
