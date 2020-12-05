<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs = [
            ['config_name'=>'RAM','created_at' => Carbon\Carbon::now()],
            ['config_name'=>'CPU', 'created_at' => Carbon\Carbon::now()],
            ['config_name'=>'VGA', 'created_at' => Carbon\Carbon::now()],
            ['config_name'=>'Màn Hình','created_at' => Carbon\Carbon::now()],
            ['config_name'=>'Ổ cứng', 'created_at' => Carbon\Carbon::now()]
        ];
        DB::table('configs')->insert($configs);
    }
}
