<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('status')->default('0');
            $table->foreignId('stage_id')->references('id')->on('stages')->cascadeOnUpdate()->cascadeOnDelete(); 
            $table->foreignId('class_id')->references('id')->on('classrooms')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('sections');
    }
};