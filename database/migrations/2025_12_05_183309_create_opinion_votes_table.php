<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opinion_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('opinion_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('type'); 
            $table->unique(['user_id', 'opinion_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opinion_votes');
    }
};