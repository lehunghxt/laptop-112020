<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 50; $i++) {
            for ($k=1; $k < 6; $k++) {
                DB::table('product_configs')->insert([
                    'pro_id'     =>  $i,
                    'config_details_id' => rand(1, 17),
                    'created_at' => Carbon\Carbon::now()
                ]);
            }
        }
    }
}
