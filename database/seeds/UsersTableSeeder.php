<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<500;$i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('secret'),
                'is_admin' => '0',
                'address' => Str::random(25),
                'zipCode' => rand(75000, 75020),
                'sport_id' => rand(1,2),
                'level' => rand(1,3),

            ]);
        }
    }
}
