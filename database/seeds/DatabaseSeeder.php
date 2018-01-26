<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            CategoryTableSeeder::class,
            TourTableSeeder::class,
            BookingTableSeeder::class,
            ListUserBookingTableSeeder::class,
            BankTableSeeder::class,
            PaymentTableSeeder::class,
            ReviewTableSeeder::class,
            LikeTableSeeder::class,
            CommentTableSeeder::class,
        ]);
    }
}
