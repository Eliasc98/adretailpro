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
            $table->string('title');
            $table->string('image_path')->nullable(); 
            $table->text('description')->nullable(); // Ad description or text
            $table->string('link')->nullable(); // URL to redirect
            $table->enum('position', ['homepage', 'sidebar', 'footer']); // Where the ad is displayed
            $table->dateTime('start_date')->nullable(); // When the ad becomes active
            $table->dateTime('end_date')->nullable(); // When the ad expires
            $table->boolean('is_active')->default(true); // Whether the ad is currently active
            $table->timestamps();
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
