<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LocationsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionRolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FieldsTableSeeder::class);
        $this->call(SlotsTableSeeder::class);
        $this->call(RoleUsersTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
    }
}
