<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->delete();
        
        DB::table('locations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_name' => 'Bangladesh',
                'country_short_name' => 'bd',
                'state'     => 'Rangpur',
                'city' => 'Saidpur',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'country_name' => 'Bangladesh',
                'country_short_name' => 'bd',
                'state'     => 'Rangpur',
                'city' => 'Gaibandha',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'country_name' => 'Bangladesh',
                'country_short_name' => 'bd',
                'state'     => 'Dhaka',
                'city' => 'Nikunjo',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            
        ));
    }
}
