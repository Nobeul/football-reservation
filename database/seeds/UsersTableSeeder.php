<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'Nobeul',
                'last_name' => 'Islam',
                'email'     => 'nobeul.cse@gmail.com',
                'email_verified_at' => Null,
                'country_id' => 1,
                'role_id'     => 2,
                'mobile'      => Null,
                'is_active'   => 1,
                'gender'      => 'male',
                'password'    => '$2y$10$BO5M8CVfc/gdIsgJv29Pj.oHYFhbdlWioMgAL4/m7s0c.K4tB25xi',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            1 => 
            array (
                'id' => 2,
                'first_name' => 'Tanjir',
                'last_name' => 'Ahmed',
                'email'     => 'tanjir.cse@gmail.com',
                'email_verified_at' => Null,
                'country_id' => 2,
                'role_id'     => 2,
                'mobile'      => Null,
                'is_active'   => 1,
                'gender'      => 'female',
                'password'    => '$2y$10$BO5M8CVfc/gdIsgJv29Pj.oHYFhbdlWioMgAL4/m7s0c.K4tB25xi',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            2 => 
            array (
                'id' => 3,
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email'     => 'admin@gmail.com',
                'email_verified_at' => Null,
                'country_id' => 3,
                'role_id'     => 1,
                'mobile'      => Null,
                'is_active'   => 1,
                'gender'      => 'male',
                'password'    => '$2y$10$BO5M8CVfc/gdIsgJv29Pj.oHYFhbdlWioMgAL4/m7s0c.K4tB25xi',
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
            
        ));
    }
}
