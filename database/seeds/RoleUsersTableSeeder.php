<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users')->delete();
        
        DB::table('role_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => '1',
                'role_id' => '2',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => '2',
                'role_id' => '2',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => '3',
                'role_id' => '1',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            
        ));
    }
}
