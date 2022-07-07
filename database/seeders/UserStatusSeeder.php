<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('user_statuses')->insert(['name' => 'Active']);
          DB::table('user_statuses')->insert(['name' => 'InActive']);
          DB::table('user_statuses')->insert(['name' => 'On Hold']);
    }
}
