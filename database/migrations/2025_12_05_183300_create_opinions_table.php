<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // FIX: Mengubah dari Schema::table menjadi Schema::create
        Schema::create('opinions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Kolom yang menyebabkan masalah sebelumnya
            $table->string('title', 150); 
            $table->string('text', 1000); 
            
            // Kolom voting
            $table->integer('upvotes')->default(0); 
            $table->integer('downvotes')->default(0); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opinions');
    }
};