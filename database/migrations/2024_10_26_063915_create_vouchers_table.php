<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->date('expire_date');
            $table->string('code');
            $table->integer('qouta');
            $table->integer('discount_price')->nullable();
            $table->integer('discount_precentage')->nullable();
            $table->integer('max_discount')->nullable();
            $table->integer('min_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
