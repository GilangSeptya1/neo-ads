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
        Schema::create('master_subdistricts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->string('name', 255);
            $table->string('postal_code', 20)->nullable();
            $table->string('code', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('name');
            $table->index('district_id');
            $table->index('postal_code');
            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_subdistricts');
    }
};
