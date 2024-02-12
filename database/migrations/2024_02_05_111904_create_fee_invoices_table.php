<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('stage_id')->references('id')->on('stages')->cascadeOnDelete();
            $table->foreignId('class_id')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('fee_id')->references('id')->on('fees')->cascadeOnDelete();
            $table->decimal('fee_amount', 8, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('fee_invoices');
    }
};