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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aircraft_id')->constrained('aircraft', 'id')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('pilot_id')->constrained('pilots', 'id')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('departure_city_id')->constrained('cities', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('arrival_city_id')->constrained('cities', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->decimal('price');
            $table->boolean('status')->default(true);
            $table->integer('free_space')->default(0);
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
