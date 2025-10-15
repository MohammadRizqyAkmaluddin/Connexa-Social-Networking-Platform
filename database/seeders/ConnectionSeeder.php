<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('connections')->insert ([
            [
                'user_id'       => 'U001',
                'user_target'   => 'U002',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U003',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U004',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U030',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U031',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U032',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U033',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U034',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U035',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U036',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U037',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U038',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U039',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U040',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U041',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U042',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U043',
                'status'        => 'Success',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U011',
                'status'        => 'Pending',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U065',
                'status'        => 'Pending',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U050',
                'status'        => 'Pending',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U013',
                'status'        => 'Pending',
            ],
            [
                'user_id'       => 'U001',
                'user_target'   => 'U090',
                'status'        => 'Pending',
            ],
        ]);
    }
}
