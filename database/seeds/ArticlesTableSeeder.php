<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,20) as $index) {
            DB::table('articles')->insert([
                'title' => $faker->sentence(3),
                'content' => $faker->text,
                'views' => $faker->numberBetween(0,100),
                'user_id' => $faker->numberBetween(1,10),
                'blog_id' => $faker->numberBetween(1,10),
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
