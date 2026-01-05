<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $faker = Faker::create();

    //     $statusList = ['Pending', 'Success'];

    //     // generate user list U001 - U100
    //     $users = [];
    //     for ($i = 1; $i <= 100; $i++) {
    //         $users[] = 'U' . str_pad($i, 3, '0', STR_PAD_LEFT);
    //     }

    //     // buat semua kombinasi user → target (kecuali diri sendiri)
    //     $combinations = [];

    //     foreach ($users as $user) {
    //         foreach ($users as $target) {
    //             if ($user !== $target) {
    //                 $combinations[] = [
    //                     'user_id'     => $user,
    //                     'user_target' => $target,
    //                 ];
    //             }
    //         }
    //     }

    //     // acak semua kombinasi
    //     shuffle($combinations);

    //     // tentukan mau insert berapa record
    //     $totalInsert = 1500; // bisa sesuai kebutuhan

    //     for ($i = 0; $i < $totalInsert; $i++) {

    //         $pair = $combinations[$i];

    //         $created_at = $faker->dateTimeBetween('-1 month', 'now');

    //         DB::table('connections')->insert([
    //             'user_id'      => $pair['user_id'],
    //             'user_target'  => $pair['user_target'],
    //             'status'       => $faker->randomElement($statusList),
    //             'created_at'   => $created_at,
    //             'updated_at'   => $faker->dateTimeBetween($created_at, 'now'),
    //         ]);
    //     }
    // }

    public function run(): void
    {
        $faker = Faker::create();
        $now = now();

        $statusList = ['Pending', 'Success'];

        // generate user list
        $users = [];
        for ($i = 1; $i <= 100; $i++) {
            $users[] = 'U' . str_pad($i, 3, '0', STR_PAD_LEFT);
        }

        // generate combinations
        $combinations = [];

        foreach ($users as $user) {
            foreach ($users as $target) {
                if ($user !== $target) {
                    $combinations[] = [
                        'user_id'     => $user,
                        'user_target' => $target,
                        'status'      => $statusList[array_rand($statusList)],
                        'created_at'  => $now,
                        'updated_at'  => $now,
                    ];
                }
            }
        }

        shuffle($combinations);

        $totalInsert = 1500;
        $chunks = array_chunk(array_slice($combinations, 0, $totalInsert), 500);

        foreach ($chunks as $chunk) {
            DB::table('connections')->insertOrIgnore($chunk);
        }
    }

}
