<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        
        DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'state_id' => 1,
                'name' => 'Nikunjo',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'state_id' => 1,
                'name' => 'Uttora',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'state_id' => 1,
                'name' => 'Mohammadpur',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            3 => 
            array (
                'id' => 4,
                'state_id' => 3,
                'name' => 'Saidpur',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            4 => 
            array (
                'id' => 5,
                'state_id' => 3,
                'name' => 'Gaibandha',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            5 => 
            array (
                'id' => 6,
                'state_id' => 3,
                'name' => 'Dinajpur',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
        ));
    }
}
