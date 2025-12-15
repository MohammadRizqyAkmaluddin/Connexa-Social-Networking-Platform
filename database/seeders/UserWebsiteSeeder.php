<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $urls = [
            'https://github.com/MohammadRizqyAkmaluddin',
            'https://mohammadrizqyakmaluddin.github.io/Portfolio/',
            'https://academiaplus.page.gd/'
        ];
        $types = [
            'Portfolio',
            'Personal',
            'Blog',
            'Business'
        ];

        for ($i = 1; $i <= 100; $i++) {
            $userId = 'U' . str_pad($i, 3, '0', STR_PAD_LEFT);

            DB::table('user_websites')->insert([
                'user_id'      => $userId,
                'URL'          => $urls[array_rand($urls)],
                'website_type' => $types[array_rand($types)],
            ]);
        }
    }
}
