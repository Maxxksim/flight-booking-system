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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('root0612'),
            ],
            [
                'name' => 'Maksim',
                'email' => 'xackiiiii@gmail.com',
                'password' => bcrypt('blek2004'),
            ],

        ]);


        DB::table('aircraft')->insert([
            ['model' => 'Boeing 737', 'seat_count' => 180, 'status' => true],
            ['model' => 'Airbus A320', 'seat_count' => 150, 'status' => true],
            ['model' => 'Boeing 747', 'seat_count' => 400, 'status' => true],
            ['model' => 'Airbus A380', 'seat_count' => 853, 'status' => true],
            ['model' => 'Embraer E195', 'seat_count' => 120, 'status' => true],
            ['model' => 'Bombardier CRJ900', 'seat_count' => 90, 'status' => true],
            ['model' => 'Cessna 208', 'seat_count' => 12, 'status' => true],
            ['model' => 'Boeing 777', 'seat_count' => 396, 'status' => true],
            ['model' => 'Airbus A321', 'seat_count' => 236, 'status' => true],
            ['model' => 'Boeing 787 Dreamliner', 'seat_count' => 296, 'status' => true],
            ['model' => 'Airbus A319', 'seat_count' => 134, 'status' => true],
            ['model' => 'ATR 72', 'seat_count' => 78, 'status' => true],
            ['model' => 'Boeing 767', 'seat_count' => 269, 'status' => true],
            ['model' => 'Airbus A310', 'seat_count' => 280, 'status' => true],
            ['model' => 'Bombardier Dash 8', 'seat_count' => 90, 'status' => true],
            ['model' => 'Sukhoi Superjet 100', 'seat_count' => 98, 'status' => true],
            ['model' => 'McDonnell Douglas MD-88', 'seat_count' => 155, 'status' => true],
            ['model' => 'Boeing 757', 'seat_count' => 200, 'status' => true],
            ['model' => 'Airbus A330', 'seat_count' => 277, 'status' => true],
            ['model' => 'Concorde', 'seat_count' => 92, 'status' => false], // Example of inactive aircraft
        ]);


        DB::table('cities')->insert([
            ['name' => 'New York', 'country' => 'USA'],
            ['name' => 'London', 'country' => 'UK'],
            ['name' => 'Paris', 'country' => 'France'],
            ['name' => 'Berlin', 'country' => 'Germany'],
            ['name' => 'Tokyo', 'country' => 'Japan'],
            ['name' => 'Los Angeles', 'country' => 'USA'],
            ['name' => 'Rome', 'country' => 'Italy'],
            ['name' => 'Madrid', 'country' => 'Spain'],
            ['name' => 'Sydney', 'country' => 'Australia'],
            ['name' => 'Moscow', 'country' => 'Russia'],
            ['name' => 'Toronto', 'country' => 'Canada'],
            ['name' => 'Dubai', 'country' => 'UAE'],
            ['name' => 'Istanbul', 'country' => 'Turkey'],
            ['name' => 'Cape Town', 'country' => 'South Africa'],
            ['name' => 'São Paulo', 'country' => 'Brazil'],
            ['name' => 'Mexico City', 'country' => 'Mexico'],
            ['name' => 'Rio de Janeiro', 'country' => 'Brazil'],
            ['name' => 'Mumbai', 'country' => 'India'],
            ['name' => 'Buenos Aires', 'country' => 'Argentina'],
            ['name' => 'Seoul', 'country' => 'South Korea'],
            ['name' => 'Cairo', 'country' => 'Egypt'],
            ['name' => 'Bangkok', 'country' => 'Thailand'],
            ['name' => 'Lagos', 'country' => 'Nigeria'],
            ['name' => 'Kuala Lumpur', 'country' => 'Malaysia'],
            ['name' => 'Lagos', 'country' => 'Nigeria'],
            ['name' => 'Singapore', 'country' => 'Singapore'],
            ['name' => 'Jakarta', 'country' => 'Indonesia'],
            ['name' => 'Hong Kong', 'country' => 'China'],
        ]);


        DB::table('pilots')->insert([
            [
                'name' => 'Maksim',
                'email' => 'xackiiiii@gmail.com',
                'license_number' => 'PSL061321'
            ],
        ]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('pilots')->truncate();
        DB::table('cities')->truncate();
        DB::table('aircraft')->truncate();
        DB::table('users')->truncate();
    }
};
