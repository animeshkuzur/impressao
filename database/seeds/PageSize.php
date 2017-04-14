<?php

use Illuminate\Database\Seeder;

class PageSize extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	['size' => 'A5','dimensions' => '5.8 x 8.3 in'],
        	['size' => 'A4','dimensions' => '8.3 x 11.7 in']
        );
        DB::table('page_sizes')->insert($data);
    }
}
