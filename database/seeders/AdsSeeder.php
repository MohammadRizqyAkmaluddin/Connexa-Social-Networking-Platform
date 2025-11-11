<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ads')->insert([
            [
                'company_id'    => 'C008.',
                'link'          => 'https://www.gojek.com/en-id',
                'image_content' => 'gojek.jpg'
            ],
            [
                'company_id'    => 'C009',
                'link'          => 'https://binus.ac.id/',
                'image_content' => 'binus.jpg'
            ],
            [
                'company_id'    => 'C005',
                'link'          => 'https://www.apple.com/id/iphone/?cid=wwa-id-kwgo-iphone-applelive-brand-brand_hero_avail_101725-iPhone-Core-Exact-Brand_Exact-apple&aosid=p240&ken_pid=go~cmp-22997543190~adg-183915409622~ad-778202613295_kwd-10778630~dev-c~ext-~prd-~mca-~nt-search&token=f8ed3188-10e0-4de1-9527-7c1db3c81d53',
                'image_content' => 'apple.jpg'
            ],
        ]);
    }
}
