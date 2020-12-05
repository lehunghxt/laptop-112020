<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'admin123',
            'password' => bcrypt('admin@123'),
            'role_id'  => 1,
            'created_at' => Carbon\Carbon::now()
        ]);
    }
}
