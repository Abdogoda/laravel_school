<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();

            $table->foreignId('from_stage')->references('id')->on('stages')->cascadeOnDelete();
            $table->foreignId('from_class')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('from_section')->references('id')->on('sections')->cascadeOnDelete();
            $table->string('from_academic_year');
            
            $table->foreignId('to_stage')->references('id')->on('stages')->cascadeOnDelete();
            $table->foreignId('to_class')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('to_section')->references('id')->on('sections')->cascadeOnDelete();
            $table->string('to_academic_year');
            
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('promotions');
    }
};