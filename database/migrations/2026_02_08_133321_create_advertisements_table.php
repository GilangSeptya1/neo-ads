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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id');
            $table->string('title', 255);
            $table->string('goal_type', 255)->nullable();
            $table->string('sticker_area_type', 50)->nullable();
            $table->unsignedBigInteger('target_location_id')->nullable();
            $table->integer('target_distance')->nullable();
            $table->integer('target_partner')->nullable();
            $table->decimal('total_budget', 15, 2)->nullable();
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
            $table->integer('duration')->nullable(); // in days
            $table->string('status', 50)->default('draft');
            $table->text('description')->nullable();
            $table->text('remarks')->nullable();
            $table->datetime('draft_at')->nullable();
            $table->datetime('on_review_at')->nullable();
            $table->datetime('searching_partner_at')->nullable();
            $table->datetime('start_at')->nullable();
            $table->datetime('completed_at')->nullable();
            $table->datetime('cancel_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('customer_id');
            $table->index('target_location_id');
            $table->index('status');
            $table->index('startdate');
            $table->index('enddate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
