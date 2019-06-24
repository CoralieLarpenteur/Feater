<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;



class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('sports')->insert([
            'name' => 'Musculation',
        
        ]);

        DB::table('sports')->insert([
            'name' => 'Running',
        
        ]);
        
        
        
    }
}
