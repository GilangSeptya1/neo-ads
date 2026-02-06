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
    Schema::table('users', function (Blueprint $table) {
        // 1. Tambah kolom photo setelah email (atau di mana saja)
        $table->string('photo')->nullable()->after('email');
        
        // 2. Ubah password jadi nullable (Solusi 1 yang tadi)
        $table->string('password')->nullable()->change();
    });
}

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('photo');
        $table->string('password')->nullable(false)->change();
    });
}
};
