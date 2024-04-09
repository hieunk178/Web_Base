<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExcelSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\ExcelSetting::factory()->create(
            [
                'key' => 'product_name',
                'value' => null,
                'default' => 0,
            ],
            // [
            //     'key' => 'product_description',
            //     'value' => null,
            //     'default' => 0,
            // ],
            // [
            //     'key' => 'product_price',
            //     'value' => null,
            //     'default' => 0,
            // ],
            // [
            //     'key' => 'product_new_price',
            //     'value' => null,
            //     'default' => 0,
            // ],
            // [
            //     'key' => 'product_quantity',
            //     'value' => null,
            //     'default' => 0,
            // ],
            // [
            //     'key' => 'product_image',
            //     'value' => null,
            //     'default' => 0,
            // ],
            // [
            //     'key' => 'product_detail',
            //     'value' => null,
            //     'default' => 0,
            // ],
            // [
            //     'key' => 'product_detail',
            //     'value' => null,
            //     'default' => 0,
            // ],
            // [
            //     'key' => 'product_brand',
            //     'value' => null,
            //     'default' => 0,
            // ],
        );
    }
}
