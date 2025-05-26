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
        Schema::table('laporan_skpds', function (Blueprint $table) {
            $table->float('penggunaan_set', 8, 2)->change(); // max 999999.99
        });
    }

    public function down(): void
    {
        Schema::table('laporan_skpds', function (Blueprint $table) {
            $table->integer('penggunaan_set')->change();
        });
    }
};
