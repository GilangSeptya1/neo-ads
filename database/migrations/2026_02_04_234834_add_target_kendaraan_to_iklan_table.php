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
    Schema::table('iklan', function (Blueprint $table) {
        // Menambahkan kolom target_kendaraan setelah kolom target_lokasi
        $table->string('target_kendaraan')->nullable()->after('target_lokasi');
    });
}

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('iklan', function (Blueprint $table) {
        $table->dropColumn('target_kendaraan');
    });
}
};
