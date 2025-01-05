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
        Schema::create('order', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('flight_id')->constrained('flight')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('user')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('seat_count');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
