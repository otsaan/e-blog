<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('users')->insert([
            'firstName' => 'admin',
            'lastName' => 'admin',
            'username' => 'admin',
            'confirmed'=> 1,
            'email'=> 'hbadir@gmail.com',
            'role'=> 'admin',
            'password'=> bcrypt('eblogadmin2016'),
            'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')
        ]);
    }
}
