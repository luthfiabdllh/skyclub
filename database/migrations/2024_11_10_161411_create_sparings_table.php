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
        Schema::create('sparings', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->enum('status_sparing', ['pending', 'done']);
            $table->foreignId('created_by')->constrained('user')->onUpdate('cascade');
            $table->foreignId('id_list_booking')->constrained('list_bookings')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sparings');
    }
};
