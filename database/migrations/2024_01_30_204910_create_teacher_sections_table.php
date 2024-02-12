<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    
    public function up(): void{
        Schema::create('teacher_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('teacher_id')->references('id')->on('teachers')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void{
        Schema::dropIfExists('teacher_sections');
    }
};