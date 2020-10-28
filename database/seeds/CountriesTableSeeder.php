<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        
        DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bangladesh',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'USA',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'UK',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Singapore',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Russia',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Brazil',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Canada',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Astralia',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Austria',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Japan',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'India',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
        ));
    }
}
