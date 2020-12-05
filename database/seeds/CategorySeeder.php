<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['cate_name'=>'Dell', 'cate_slug' => 'Dell', 'cate_status' => 'active','created_at' => Carbon\Carbon::now()],
            ['cate_name'=>'Asus', 'cate_slug' => 'Assus', 'cate_status' => 'active','created_at' => Carbon\Carbon::now()],
            ['cate_name'=>'Acer', 'cate_slug' => 'Acer', 'cate_status' => 'active','created_at' => Carbon\Carbon::now()],
            ['cate_name'=>'HP', 'cate_slug' => 'HP', 'cate_status' => 'active','created_at' => Carbon\Carbon::now()],
            ['cate_name'=>'Samsung', 'cate_slug' => 'Samsung', 'cate_status' => 'active','created_at' => Carbon\Carbon::now()],
            ['cate_name'=>'Macbook', 'cate_slug' => 'Macbook', 'cate_status' => 'active','created_at' => Carbon\Carbon::now()],
            ['cate_name'=>'Lenovo', 'cate_slug' => 'Lenovo', 'cate_status' => 'active','created_at' => Carbon\Carbon::now()]
        ];
        DB::table('categories')->insert($categories);
    }
}
