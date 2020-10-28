<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();
        
        DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_id' => 1,
                'name' => 'Dhaka',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'country_id' => 1,
                'name' => 'Rajshahi',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'country_id' => 1,
                'name' => 'Rangpur',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            3 => 
            array (
                'id' => 4,
                'country_id' => 2,
                'name' => 'California',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            4 => 
            array (
                'id' => 5,
                'country_id' => 2,
                'name' => 'Texas',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            5 => 
            array (
                'id' => 6,
                'country_id' => 2,
                'name' => 'Florida',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            6 => 
            array (
                'id' => 7,
                'country_id' => 2,
                'name' => 'Washington',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
        ));
    }
}
