<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_roles')->delete();
        
        DB::table('permission_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'permission_id' => 1,
                'role_id' => 1,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'permission_id' => 2,
                'role_id' => 1,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'permission_id' => 2,
                'role_id' => 2,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 4,
                'permission_id' => 3,
                'role_id' => 1,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 5,
                'permission_id' => 3,
                'role_id' => 2,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            
        ));
    }
}
