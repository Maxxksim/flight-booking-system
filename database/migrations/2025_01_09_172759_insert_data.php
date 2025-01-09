<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('password123'),
            ]
        ]);


        DB::table('aircraft')->insert([
            [
                'model' => 'Boeing 737',
                'seat_count' => 180,
                'status' => true,
            ],
            [
                'model' => 'Airbus A320',
                'seat_count' => 150,
                'status' => true,
            ]
        ]);

        DB::table('cities')->insert([
            [
                'name' => 'New York',
                'country' => 'USA',
            ],
            [
                'name' => 'London',
                'country' => 'UK',
            ]
        ]);

        DB::table('pilots')->insert([
            [
                'name' => 'James Bond',
                'email' => 'james.bond@mi6.com',
                'flight_count' => 500,
            ],
            [
                'name' => 'Ethan Hunt',
                'email' => 'ethan.hunt@imf.com',
                'flight_count' => 300,
            ]
        ]);

        DB::table('flights')->insert([
            [
                'aircraft_id' => 1,
                'pilot_id' => 1,
                'departure_city_id' => 1,
                'arrival_city_id' => 2,
                'departure_date' => '2025-01-15',
                'arrival_date' => '2025-01-15',
                'price' => 500.00,
                'status' => true,
            ],
            [
                'aircraft_id' => 2,
                'pilot_id' => 2,
                'departure_city_id' => 2,
                'arrival_city_id' => 1,
                'departure_date' => '2025-02-20',
                'arrival_date' => '2025-02-20',
                'price' => 600.00,
                'status' => true,
            ]
        ]);


        DB::table('orders')->insert([
            [
                'flight_id' => 1,
                'user_id' => 1,
                'seat_count' => 2,
                'email' => 'john.doe@example.com',
            ],
            [
                'flight_id' => 2,
                'user_id' => 2,
                'seat_count' => 1,
                'email' => 'jane.smith@example.com',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('orders')->truncate();
        DB::table('flights')->truncate();
        DB::table('pilots')->truncate();
        DB::table('cities')->truncate();
        DB::table('aircraft')->truncate();
        DB::table('users')->truncate();
    }
};
