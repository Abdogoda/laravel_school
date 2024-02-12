<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('stage_id')->references('id')->on('stages')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('classrooms');
    }
};