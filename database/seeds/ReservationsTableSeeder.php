<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->delete();
        
        DB::table('reservations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'field_id' => 1,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'field_id' => 2,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'field_id' => 3,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            
        ));
    }
}
