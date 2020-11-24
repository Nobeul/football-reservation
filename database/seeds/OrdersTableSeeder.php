<?php

use App\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();

        DB::table('permission_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'transaction_id' => Null,
                'amount' => 2,
                'payment_status' => 0,
                'created_at'  => Null,
                'updated_at'  => Null,
            ),
        ));
    }
}
