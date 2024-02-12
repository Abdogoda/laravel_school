<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('fee_invoice_id')->nullable()->references('id')->on('fee_invoices')->cascadeOnDelete();
            $table->foreignId('receipt_id')->nullable()->references('id')->on('student_receipts')->cascadeOnDelete();
            $table->foreignId('bill_of_exchange_id')->nullable()->references('id')->on('bill_of_exchanges')->cascadeOnDelete();
            $table->foreignId('exclude_fee_id')->nullable()->references('id')->on('exclude_fees')->cascadeOnDelete();
            $table->decimal('debit', 8, 2)->default('0.00')->nullable();
            $table->decimal('credit', 8, 2)->default('0.00')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('student_accounts');
    }
};