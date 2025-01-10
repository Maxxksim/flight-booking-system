<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE OR REPLACE FUNCTION set_free_space()
            RETURNS TRIGGER AS $$
            BEGIN
                SELECT seat_count INTO NEW.free_space
                FROM aircraft
                WHERE id = NEW.aircraft_id;

                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ');

        DB::unprepared('
            CREATE TRIGGER set_free_space_trigger
            BEFORE INSERT ON flights
            FOR EACH ROW
            EXECUTE FUNCTION set_free_space();
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS set_free_space_trigger ON flights');

        DB::unprepared('DROP FUNCTION IF EXISTS set_free_space()');
    }
};
