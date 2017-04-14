<?php

use Illuminate\Database\Seeder;

class PaymentMode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	['mode' => 'COD'],
        	['mode' => 'Paytm']
        );
        DB::table('payment_modes')->insert($data);
    }
}
