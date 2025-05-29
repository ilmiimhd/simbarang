<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE kerusakan_barang MODIFY kondisi ENUM('baik', 'rusak', 'perbaikan', 'rusak_berat') NOT NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE kerusakan_barang MODIFY kondisi ENUM('baik', 'rusak', 'perbaikan') NOT NULL");
    }
};
