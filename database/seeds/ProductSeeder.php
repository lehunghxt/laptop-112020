<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $cate = ['Dell', 'Samsung', 'Asus', 'Acer', 'Lenovo', 'Macbook'];
        $ram = ['4GB', '8GB', '16GB'];
        $cpu = ['i3', 'i5', 'i7'];
        $vga = ['Onboard', 'Card Rời'];
        $monitor = ['14 inch', '15.6 inch', '17 inch'];
        $disk = ['HDD', 'SSD'];
        for ($i=0; $i < 50; $i++) {
            $pro_name = 'Laptop '.$cate[array_rand($cate)];
            $pro_name .= ' RAM '.$ram[array_rand($ram)];
            $pro_name .= ' CPU '.$cpu[array_rand($cpu)];
            $pro_name .= ' VGA '.$vga[array_rand($vga)];
            $pro_name .= ' Monitor '.$monitor[array_rand($monitor)];
            $pro_name .= ' Ổ cứng '.$disk[array_rand($disk)];
            DB::table('products')->insert([
	            'pro_name'     =>  $pro_name,
	            'pro_slug'     =>  slug($pro_name),
	            'pro_price'     =>  '1'.rand(1, 9).'000000',
	            'pro_code'    => generateCode(3).'-'.generateCode(3).'-'.generateCode(3),
	            'cate_id' => rand(1,7),
                'pro_image'   => 'laptop.jpg',
                'pro_qty'   => rand(1, 20),
                'pro_des'   => 'Noi dung mo ta',
                'pro_status'   => 'active',
                'created_at' => Carbon\Carbon::now()
	        ]);
    	}
    }
}
