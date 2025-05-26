<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Langkah 1: Rename kolom dulu
        Schema::table('laporan_skpds', function (Blueprint $table) {
            $table->renameColumn('penggunaan_set', 'penggunaan_lembar');
        });

        // Langkah 2: Baru ubah tipe datanya ke integer
        Schema::table('laporan_skpds', function (Blueprint $table) {
            $table->integer('penggunaan_lembar')->change();
        });
    }

    public function down(): void
    {
        // Langkah 1: Balikin nama kolom
        Schema::table('laporan_skpds', function (Blueprint $table) {
            $table->renameColumn('penggunaan_lembar', 'penggunaan_set');
        });

        // Langkah 2: Balikin tipe ke float
        Schema::table('laporan_skpds', function (Blueprint $table) {
            $table->float('penggunaan_set', 8, 2)->change();
        });
    }
};
