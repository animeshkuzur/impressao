<?php

use Illuminate\Database\Seeder;

class PrintSide extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	['side' => 'Single'],
        	['side' => 'Both']
        );
        DB::table('print_sides')->insert($data);
    }
}
