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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nip')->unique()->after('id');
            $table->string('jabatan')->nullable()->after('name');
            $table->string('instansi')->nullable()->after('jabatan');
            $table->enum('role', ['admin', 'staff'])->default('staff')->after('instansi');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nip', 'jabatan', 'instansi', 'role']);
        });
    }
};
