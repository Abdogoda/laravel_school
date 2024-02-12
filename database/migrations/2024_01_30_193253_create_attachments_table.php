<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
            $table->bigInteger('attachmentable_id')->unsigned();
            $table->string('model');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('attachments');
    }
};