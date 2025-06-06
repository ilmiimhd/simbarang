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
        Schema::table('kerusakan_barang', function (Blueprint $table) {
            $table->string('kode_barang')->nullable()->after('barang_id');
        });
    }

    public function down()
    {
        Schema::table('kerusakan_barang', function (Blueprint $table) {
            $table->dropColumn('kode_barang');
        });
    }
};
