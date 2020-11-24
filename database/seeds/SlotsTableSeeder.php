<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slots')->delete();
        
        DB::table('slots')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'field_id' => 1,
                'total_seat' => 30,
                'seat_price' => 15,
                'start_time' => Carbon::now()->subDays(7)->toDateTimeString(),
                'end_time' => Carbon::now()->subDays(7)->toDateTimeString(),
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'field_id' => 2,
                'total_seat' => 35,
                'seat_price' => 10,
                'start_time' => Carbon::now()->subDays(7)->toDateTimeString(),
                'end_time' => Carbon::now()->subDays(7)->toDateTimeString(),
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'field_id' => 3,
                'total_seat' => 40,
                'seat_price' => 5,
                'start_time' => Carbon::now()->subDays(7)->toDateTimeString(),
                'end_time' => Carbon::now()->subDays(7)->toDateTimeString(),
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            
        ));
    }
}
