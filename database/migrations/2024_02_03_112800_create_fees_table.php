<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('cost', 8, 2);
            $table->foreignId('stage_id')->references('id')->on('stages')->cascadeOnDelete();
            $table->foreignId('class_id')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->text('notes')->nullable();
            $table->string('academic_year');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('fees');
    }
};