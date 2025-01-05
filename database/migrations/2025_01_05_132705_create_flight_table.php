<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flight', function (Blueprint $table) {
            $table->id('flight_id');
            $table->foreignId('aircraft_id')->constrained('aircraft')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('pilot_id')->constrained('pilot')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('departure_city_id')->constrained('city')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('arrival_city_id')->constrained('city')->cascadeOnUpdate()->restrictOnDelete();
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->decimal('price');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight');
    }
};
