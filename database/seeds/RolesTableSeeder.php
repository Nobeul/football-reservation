<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        
        DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'description' => 'only admin will use this role.',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'description' => 'Customers are treated as users.',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            
        ));
    }
}
