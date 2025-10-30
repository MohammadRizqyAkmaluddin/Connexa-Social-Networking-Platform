<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        // Total kombinasi random yang ingin dibuat (bisa kamu ubah)
        $totalRecords = 2000; 

        for ($i = 0; $i < $totalRecords; $i++) {
            $data[] = [
                'post_id' => rand(1, 8),
                'user_id' => 'U' . str_pad(rand(1, 100), 3, '0', STR_PAD_LEFT),
            ];
        }

        // Hilangkan duplikat kombinasi (post_id + user_id)
        $unique = [];
        $finalData = [];
        foreach ($data as $row) {
            $key = $row['post_id'] . '-' . $row['user_id'];
            if (!isset($unique[$key])) {
                $unique[$key] = true;
                $finalData[] = $row;
            }
        }

        DB::table('likes')->insert($finalData);
    }
}
