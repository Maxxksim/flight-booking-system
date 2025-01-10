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
            CREATE OR REPLACE FUNCTION update_flight_count()
            RETURNS TRIGGER AS $$
            BEGIN
                IF TG_OP = \'INSERT\' THEN
                    UPDATE pilots
                    SET flights = (
                        SELECT COUNT(*)
                        FROM flights
                        WHERE flights.pilot_id = NEW.pilot_id
                    )
                    WHERE id = NEW.pilot_id;
                ELSIF TG_OP = \'DELETE\' THEN
                    UPDATE pilots
                    SET flights = (
                        SELECT COUNT(*)
                        FROM flights
                        WHERE flights.pilot_id = OLD.pilot_id
                    )
                    WHERE id = OLD.pilot_id;
                END IF;

                RETURN NULL;
            END;
            $$ LANGUAGE plpgsql;
        ');

        DB::unprepared('
            CREATE TRIGGER update_flight_count_trigger
            AFTER INSERT OR DELETE ON flights
            FOR EACH ROW
            EXECUTE FUNCTION update_flight_count();
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_flight_count_trigger ON flights');

        DB::unprepared('DROP FUNCTION IF EXISTS update_flight_count()');
    }
};
