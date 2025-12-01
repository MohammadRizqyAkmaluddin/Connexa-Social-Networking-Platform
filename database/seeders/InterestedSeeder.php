<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class InterestedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua user & company IDs sebagai array
        $users = DB::table('users')->pluck('user_id')->toArray();
        $companies = DB::table('companies')->pluck('company_id')->toArray();

        // Jika tidak ada company atau user, stop
        if (empty($users) || empty($companies)) {
            $this->command->info('No users or companies found, skipping InterestedSeeder.');
            return;
        }

        foreach ($users as $userId) {
            // jumlah random 1 - 5, tapi dibatasi oleh jumlah companies yg tersedia
            $desired = rand(1, 5);
            $count = min($desired, count($companies));

            // shuffle dan slice -> pasti mengembalikan array (tanpa duplikasi)
            $shuffled = $companies;
            shuffle($shuffled);
            $selectedCompanies = array_slice($shuffled, 0, $count);

            $now = now();

            $inserts = [];
            foreach ($selectedCompanies as $companyId) {
                $inserts[] = [
                    'user_id'    => $userId,
                    'company_id' => $companyId,
                ];
            }

            // Insert in chunk jika banyak
            if (!empty($inserts)) {
                DB::table('interested')->insert($inserts);
            }
        }
    }
}
