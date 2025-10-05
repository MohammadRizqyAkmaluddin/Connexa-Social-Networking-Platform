<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{

    public function run()
    {
          DB::table('pages')->insert([
            [
                'page_id'    => 'EDU',
                'page_type'  => 'Educational Institution',
                'description'=> 'School and universities',
                'image'      => 'edu.png',
            ],
            [
                'page_id'    => 'COM',
                'page_type'  => 'Company',
                'description'=> 'Small, medium, and large businesses',
                'image'      => 'com.png',
            ],
        ]);
    }
}
