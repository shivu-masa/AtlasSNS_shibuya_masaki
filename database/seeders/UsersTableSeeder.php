<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 DB::table('users')->insert([
            ['username' => 'shivu',
            'email' => '1111@gg.com',
            'password' => bcrypt('123'),]
  ]);
        //
    }
}
