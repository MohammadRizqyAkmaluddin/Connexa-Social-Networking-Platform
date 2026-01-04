<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeSeeder extends Seeder
{

    public function run()
    {
        // DB::table('modes')->insert([
        //     [
        //         'mode_id' => 'HY',
        //         'mode'    => 'Hybrid',
        //     ],
        //     [
        //         'mode_id' => 'OS',
        //         'mode'    => 'On-site',
        //     ],
        //     [
        //         'mode_id' => 'RE',
        //         'mode'    => 'Remote',
        //     ],
        // ]);

         $modes = [
            ['mode_id' => 'HY', 'mode' => 'Hybrid'],
            ['mode_id' => 'OS', 'mode' => 'On-site'],
            ['mode_id' => 'RE', 'mode' => 'Remote'],
        ];

        foreach ($modes as $mode) {
            DB::table('modes')->updateOrInsert(
                ['mode_id' => $mode['mode_id']], // cek primary key
                ['mode' => $mode['mode']]        // data update / insert
            );
        }


    }
}
