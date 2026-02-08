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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            
            // Log details
            $table->string('log_name')->nullable(); // e.g., 'user_activity', 'system'
            $table->text('description');
            
            // Subject (what was affected)
            $table->nullableMorphs('subject'); // subject_type, subject_id
            
            // Causer (who did it)
            $table->nullableMorphs('causer'); // causer_type, causer_id
            
            // Additional data
            $table->json('properties')->nullable();
            $table->string('event')->nullable(); // created, updated, deleted
            
            // Request info
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('url')->nullable();
            $table->string('method', 10)->nullable(); // GET, POST, etc.
            
            $table->timestamps();
            
            // Indexes
            $table->index('log_name');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
