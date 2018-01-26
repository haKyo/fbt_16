<?php

use Illuminate\Database\Seeder;

class ListUserBookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ListUserBooking::class, 5)->create();
    }
}
