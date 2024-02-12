<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    
    public function up(): void{
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->boolean('status')->default(false);
            $table->foreignId('question_id')->references('id')->on('questions')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('answers');
    }
};