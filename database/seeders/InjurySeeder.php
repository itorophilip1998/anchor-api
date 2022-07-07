<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class InjurySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('injuries')->insert(['id' => 1, 'name' => 'Bodily Injury']);      
        DB::table('injuries')->insert(['id' => 2, 'name' => 'Property Damage ']);      
        DB::table('injuries')->insert(['id' => 3, 'name' => 'Other']);      
    }
}
