<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        
        DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'manage_ticket',
                'description' => 'Manage Ticket',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'create_ticket',
                'description' => 'Create Ticket',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'delete_ticket',
                'description' => 'Delete Ticket',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            
        ));
    }
}
