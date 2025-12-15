<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProfileViewSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $users = collect(range(1, 100))
            ->map(fn ($i) => 'U' . str_pad($i, 3, '0', STR_PAD_LEFT))
            ->toArray();

        $data = [];
        $usedPairs = [];
        while (count($data) < 6000) {

            $viewer = $faker->randomElement($users);
            $target = $faker->randomElement($users);
            if ($viewer === $target) {
                continue;
            }

            $key = $viewer . '-' . $target;
            if (isset($usedPairs[$key])) {
                continue;
            }

            $usedPairs[$key] = true;

            $data[] = [
                'user_id'     => $viewer,
                'user_target' => $target,
            ];
        }

        DB::table('profile_views')->insert($data);
    }
}
