<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->references('id')->on('quizzes')->cascadeOnDelete();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->float('degree');
            $table->enum('abuse', ['0', '1'])->default('0');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('degrees');
    }
};