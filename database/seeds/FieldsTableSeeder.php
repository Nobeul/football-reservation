<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->delete();
        
        DB::table('fields')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bangabandhu National Stadium',
                'country_id' => 3,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sher E Bangla National Stadium',
                'country_id' => 3,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Shaheed Chandu Stadium',
                'country_id' => 2,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            
        ));
    }
}
