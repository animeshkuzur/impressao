<?php

use Illuminate\Database\Seeder;

class Binding extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	['type' => 'Staple Binding','price' => 10.00],
        	['type' => 'Spiral Binding','price' => 25.00],
        	['type' => 'Book Binding','price' => 50.00],
        	['type' => 'Project Binding','price' => 150.00],
        	['type' => 'Project Binding with Gloden print','price' => 180.00],
        	['type' => 'Plain Binding','price' => 20.00],
        	['type' => 'Lamination','price' => 18.00]
        );
        DB::table('bindings')->insert($data);
    }
}
