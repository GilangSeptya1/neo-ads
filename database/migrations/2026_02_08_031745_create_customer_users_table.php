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
        Schema::create('customer_users', function (Blueprint $table) {
            $table->id(); 
            $table->string('first_name', 255); 
            $table->string('last_name', 255)->nullable();
            $table->string('phone', 30)->nullable();
            $table->unsignedBigInteger('customer_id')->nullable(); 
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->timestamps();
            $table->softDeletes();

            $table->index('first_name');
            $table->index('customer_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_users');
    }
};
