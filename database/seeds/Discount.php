<?php

use Illuminate\Database\Seeder;

class Discount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['coupon' => 'PRINT50','rebate' => 50,'validity' => '2017-04-30 23:59:59'];
        DB::table('discounts')->insert($data);
    }
}
