<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'seat_price' => 350,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'field_id' => 2,
                'total_seat' => 35,
                'seat_price' => 300,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'field_id' => 3,
                'total_seat' => 40,
                'seat_price' => 250,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            
        ));
    }
}
