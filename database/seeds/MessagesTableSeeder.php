<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MessagesTableSeeder extends Seeder
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
            DB::table('messages')->insert([
                'from_user_id' => $index,
                'to_user_id' => 11-$index,
                'content' => $faker->paragraph(),
                'read' => $faker->boolean(50),
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
