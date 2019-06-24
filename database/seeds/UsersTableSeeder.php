<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        for($i=0;$i<20;$i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('secret'),
                'is_admin' => '0',
                'address' => Str::random(25),
                'zipCode' => rand(75000, 75020),
                'level' => rand(1,3),

            ]);
        }
    }
}
