<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
	    	DB::table('users')->insert([
	            'name'     =>  Str::random(10),
	            'email'    => Str::random(10).'@gmail.com',
	            'password' => bcrypt('admin123'),
                'status'   => 'active',
                'created_at' => Carbon\Carbon::now()
	        ]);
    	}
    }
}
