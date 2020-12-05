<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config_details = [
            [
                ['config_detail_name' => '2GB', 'config_id' => '1', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => '4GB', 'config_id' => '1', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => '6GB', 'config_id' => '1', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => '8GB', 'config_id' => '1', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => '16GB', 'config_id' => '1', 'created_at' => Carbon\Carbon::now()]
            ],
            [
                ['config_detail_name' => 'i3', 'config_id' => '2', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => 'i5', 'config_id' => '2', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => 'i7', 'config_id' => '2', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => 'i9', 'config_id' => '2', 'created_at' => Carbon\Carbon::now()]
            ],
            [
                ['config_detail_name' => 'Onboard', 'config_id' => '3', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => 'Card Rời', 'config_id' => '3', 'created_at' => Carbon\Carbon::now()]
            ],
            [
                ['config_detail_name' => '12 inch', 'config_id' => '4', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => '14 inch', 'config_id' => '4', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => '15.6 inch', 'config_id' => '4', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => '17 inch', 'config_id' => '4', 'created_at' => Carbon\Carbon::now()]
            ],
            [
                ['config_detail_name' => 'HDD', 'config_id' => '5', 'created_at' => Carbon\Carbon::now()],
                ['config_detail_name' => 'SSD', 'config_id' => '5', 'created_at' => Carbon\Carbon::now()]
            ],
        ];
        for ($i=0; $i < 5; $i++) {
            DB::table('config_details')->insert($config_details[$i]);
        }
    }
}
