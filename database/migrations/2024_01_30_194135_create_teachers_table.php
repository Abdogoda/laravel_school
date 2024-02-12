<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('national_id');
            $table->string('passport_id')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->date('birth_of_date');
            $table->date('joining_date');

            $table->foreignId('specialization_id')->references('id')->on('specializations')->cascadeOnUpdate();
            $table->foreignId('gender_id')->references('id')->on('genders')->cascadeOnUpdate();
            $table->foreignId('nationality_id')->references('id')->on('nationalities')->cascadeOnUpdate();
            $table->foreignId('blood_id')->references('id')->on('bloods')->cascadeOnUpdate();
            $table->foreignId('religion_id')->references('id')->on('religions')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('teachers');
    }
};