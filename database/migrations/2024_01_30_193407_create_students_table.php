<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('password');
            $table->string('national_id');
            $table->string('passport_id')->nullable();
            $table->date('birth_of_date');
            $table->string('academic_year');
            
            $table->foreignId('gender_id')->references('id')->on('genders')->cascadeOnUpdate();
            $table->foreignId('nationality_id')->references('id')->on('nationalities')->cascadeOnUpdate();
            $table->foreignId('blood_id')->references('id')->on('bloods')->cascadeOnUpdate();
            $table->foreignId('religion_id')->references('id')->on('religions')->cascadeOnUpdate();
            
            $table->foreignId('stage_id')->references('id')->on('stages')->cascadeOnUpdate();
            $table->foreignId('class_id')->references('id')->on('classrooms')->cascadeOnUpdate();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnUpdate();
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('students');
    }
};