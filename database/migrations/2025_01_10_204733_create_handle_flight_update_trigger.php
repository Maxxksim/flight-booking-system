<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE OR REPLACE FUNCTION handle_flight_update()
            RETURNS TRIGGER AS $$
            BEGIN
                IF NEW.pilot_id IS DISTINCT FROM OLD.pilot_id THEN
                    UPDATE pilots
                    SET flights = (
                        SELECT COUNT(*)
                        FROM flights
                        WHERE flights.pilot_id = OLD.pilot_id
                    )
                    WHERE id = OLD.pilot_id;

                    UPDATE pilots
                    SET flights = (
                        SELECT COUNT(*)
                        FROM flights
                        WHERE flights.pilot_id = NEW.pilot_id
                    )
                    WHERE id = NEW.pilot_id;
                END IF;

                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ');

        DB::unprepared('
            CREATE TRIGGER handle_flight_update_trigger
            AFTER UPDATE ON flights
            FOR EACH ROW
            EXECUTE FUNCTION handle_flight_update();
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS handle_flight_update_trigger ON flights');

        DB::unprepared('DROP FUNCTION IF EXISTS handle_flight_update()');
    }
};
