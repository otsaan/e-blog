<?php

use App\User;
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
                'username' => User::find($index)->username,
                'user_id' => $index,
                'status' => $faker->randomElement(['active','inactive','disabled']),
                'views' => $faker->numberBetween(0,100),
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
