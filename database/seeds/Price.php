<?php

use Illuminate\Database\Seeder;

class Price extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 1,
        		'print_type_id' => 1,
        		'print_side_id' => 1,
        		'price' => 0.50,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 1,
        		'print_type_id' => 1,
        		'print_side_id' => 2,
        		'price' => 0.75,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 1,
        		'print_type_id' => 2,
        		'print_side_id' => 1,
        		'price' => 3.00,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 1,
        		'print_type_id' => 2,
        		'print_side_id' => 2,
        		'price' => 5.00,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 2,
        		'print_type_id' => 1,
        		'print_side_id' => 1,
        		'price' => 1.00,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 2,
        		'print_type_id' => 1,
        		'print_side_id' => 2,
        		'price' => 1.50,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 2,
        		'print_type_id' => 2,
        		'print_side_id' => 1,
        		'price' => 4.00,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 2,
        		'print_type_id' => 2,
        		'print_side_id' => 2,
        		'price' => 7.00,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 3,
        		'print_type_id' => 1,
        		'print_side_id' => 1,
        		'price' => 1.50,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 3,
        		'print_type_id' => 1,
        		'print_side_id' => 2,
        		'price' => 2.00,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 3,
        		'print_type_id' => 2,
        		'print_side_id' => 1,
        		'price' => 6.00,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 3,
        		'print_type_id' => 2,
        		'print_side_id' => 2,
        		'price' => 10.00,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 4,
        		'print_type_id' => 1,
        		'print_side_id' => 1,
        		'price' => 5.00,
        	],
        	[
        		'page_size_id' => 1,
        		'page_type_id' => 4,
        		'print_type_id' => 2,
        		'print_side_id' => 1,
        		'price' => 10.00,
        	],

        	[
        		'page_size_id' => 2,
        		'page_type_id' => 1,
        		'print_type_id' => 1,
        		'print_side_id' => 1,
        		'price' => 0.80,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 1,
        		'print_type_id' => 1,
        		'print_side_id' => 2,
        		'price' => 1.25,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 1,
        		'print_type_id' => 2,
        		'print_side_id' => 1,
        		'price' => 7.00,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 1,
        		'print_type_id' => 2,
        		'print_side_id' => 2,
        		'price' => 10.00,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 2,
        		'print_type_id' => 1,
        		'print_side_id' => 1,
        		'price' => 1.00,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 2,
        		'print_type_id' => 1,
        		'print_side_id' => 2,
        		'price' => 1.50,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 2,
        		'print_type_id' => 2,
        		'print_side_id' => 1,
        		'price' => 10.00,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 2,
        		'print_type_id' => 2,
        		'print_side_id' => 2,
        		'price' => 15.00,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 3,
        		'print_type_id' => 1,
        		'print_side_id' => 1,
        		'price' => 1.50,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 3,
        		'print_type_id' => 1,
        		'print_side_id' => 2,
        		'price' => 2.00,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 3,
        		'print_type_id' => 2,
        		'print_side_id' => 1,
        		'price' => 10.00,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 3,
        		'print_type_id' => 2,
        		'print_side_id' => 2,
        		'price' => 15.00,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 4,
        		'print_type_id' => 1,
        		'print_side_id' => 1,
        		'price' => 5.00,
        	],
        	[
        		'page_size_id' => 2,
        		'page_type_id' => 4,
        		'print_type_id' => 2,
        		'print_side_id' => 1,
        		'price' => 10.00,
        	]

        );
        DB::table('prices')->insert($data);
    }
}
