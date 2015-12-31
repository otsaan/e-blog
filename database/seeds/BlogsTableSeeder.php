<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('blogs')->insert([
                'username' => $faker->userName,
                'user_id' => $index,
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
