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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // long integer, auto increment
            $table->string('name', 255);
            $table->integer('customer_type_id')->nullable();
            $table->integer('customer_category_id')->nullable();
            $table->text('description')->nullable();
            $table->string('NPWP_number', 30)->nullable();
            $table->integer('master_location_id')->nullable();
            $table->text('address')->nullable();
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // deleted_at

            $table->index('name');
            $table->index('customer_type_id');
            $table->index('customer_category_id');
            $table->index('master_location_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
