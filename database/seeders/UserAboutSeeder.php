<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_ID');

        for ($i = 1; $i <= 100; $i++ )
        {
            $userId = 'U' . str_pad($i, 3, '0', STR_PAD_LEFT);

             $about = "
                <p>{$faker->paragraph(7)}</p>
                <p>{$faker->paragraph(3)}</p>
                <p>Currently exploring {$faker->randomElement(['Web3', 'Blockchain', 'AI Development', 'Cloud Computing', 'Machine Learning', 'Distributed Systems'])} and learning more about {$faker->randomElement(['smart contracts', 'decentralized apps', 'system architecture', 'neural networks', 'microservices'])}.</p>
            ";

            DB::table('user_about')->insert([
                'user_id'   => $userId,
                'about'     => $about
            ]);
        }

    }
}
