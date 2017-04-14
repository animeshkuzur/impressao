<?php

use Illuminate\Database\Seeder;

class PageType extends Seeder
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
        		'type' => '75 GSM',
        		'description' => 'Long lasting whiteness, crisp & brighter colour impression. Quality photocopy, project reports & resume.'
        	],
        	[
        		'type' => '100 GSM Cedar',
        		'description' => 'Fully coated super smooth paper, sharper images, intensive colour, clear crisp text. Brochures, annual reports, menus, flyers, direct mail, postcard. Preferred for colour printing.'
        	],
        	[
        		'type' => '90 GSM BOND',
        		'description' => 'Bright and white water-marked paper, long lasting aesthetically appealing paper. Projects, presentations, resumes, letterheads.'
        	],
        	[
        		'type' => '75 GSM Sticker Paper',
        		'description' => 'Long lasting whiteness, crisp & brighter colour impression along with adhesive property. Quality photocopy, project reports & resume.'
        	]
        );
        DB::table('page_types')->insert($data);
    }
}
