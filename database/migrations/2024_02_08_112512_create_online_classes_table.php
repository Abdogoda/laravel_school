<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('online_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stage_id')->references('id')->on('stages')->cascadeOnDelete();
            $table->foreignId('class_id')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('meeting_id');
            $table->string('topic');
            $table->dateTime('start_at');
            $table->integer('duration');
            $table->string('password')->nullable();
            $table->text('start_url');
            $table->text('join_url');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('online_classes');
    }
};