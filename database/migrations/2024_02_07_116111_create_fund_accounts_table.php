<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('fund_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->nullable()->references('id')->on('student_receipts')->cascadeOnDelete();
            $table->foreignId('bill_of_exchange_id')->nullable()->references('id')->on('bill_of_exchanges')->cascadeOnDelete();
            $table->decimal('debit', 8, 2)->default("0.00")->nullable();
            $table->decimal('credit', 8, 2)->default("0.00")->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('fund_accounts');
    }
};