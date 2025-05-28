<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('kerusakan_barang', function (Blueprint $table) {
            $table->dropColumn('foto_rusak');
        });
    }

    public function down(): void {
        Schema::table('kerusakan_barang', function (Blueprint $table) {
            $table->string('foto_rusak')->nullable();
        });
    }
};
