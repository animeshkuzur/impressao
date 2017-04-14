<?php

use Illuminate\Database\Seeder;

class PrintType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	['color' => 'Black and White'],
        	['color' => 'Color']
        );
        DB::table('print_types')->insert($data);
    }
}
