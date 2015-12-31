<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AttachmentsTableSeeder extends Seeder
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
            DB::table('attachments')->insert([
                'name' => $faker->randomAscii,
                'mimetype' => $faker->mimeType,
                'type' => $faker->randomElement(['Photo','Video','Document','Code']),
                'path' => $faker->url,
                'article_id' => $faker->numberBetween(1,10),
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
