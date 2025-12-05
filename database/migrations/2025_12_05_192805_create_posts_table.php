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
        Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content'); // The article body
        $table->string('image')->nullable(); // URL or path to image
        $table->enum('category', ['news', 'opinion', 'analysis', 'cybersecurity']); // To categorize results
        $table->string('author')->default('Admin'); // Simple author name
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
