<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = DB::table('users')->pluck('user_id');
        $languages = DB::table('languages')->pluck('language_id')->toArray();

        $englishId = 23;
        $proficiencies = ['EP', 'FP', 'LW', 'PW', 'NA'];

         foreach ($users as $userId) {

            DB::table('user_languages')->insert([
                'user_id'        => $userId,
                'language_id'    => $englishId,
                'proficiency_id' => $faker->randomElement($proficiencies),
            ]);

            $otherLanguages = array_filter($languages, fn($id) => $id != $englishId);

            $randomCount = rand(1, 4);

            $selected = $faker->randomElements($otherLanguages, $randomCount);

            foreach ($selected as $langId) {
                DB::table('user_languages')->insert([
                    'user_id'        => $userId,
                    'language_id'    => $langId,
                    'proficiency_id' => $faker->randomElement($proficiencies),
                ]);
            }
        }
    }
}
