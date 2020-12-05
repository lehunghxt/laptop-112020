<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(AdminTableSeeder::class);
        //  $this->call(UserTableSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(ConfigTableSeeder::class);
         $this->call(ConfigDetailSeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(ProductConfigSeeder::class);
    }
}
