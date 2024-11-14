<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TRUNCATE DATABASE
        DB::table('bookings')->truncate();

        // Booking data
        $bookings = [
            [
                'hotel_id' => 1,
                'customer_name' => 'John Doe',
                'customer_contact' => 'john.doe@example.com',
                'checkin_time' => new DateTime('2024-11-01 14:00:00'),
                'checkout_time' => new DateTime('2024-11-05 12:00:00'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hotel_id' => 2,
                'customer_name' => 'Jane Smith',
                'customer_contact' => 'jane.smith@example.com',
                'checkin_time' => new DateTime('2024-11-10 15:00:00'),
                'checkout_time' => new DateTime('2024-11-12 11:00:00'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];

        // INSERT INTO DATABASE
        DB::table('bookings')->insert($bookings);
    }
}
