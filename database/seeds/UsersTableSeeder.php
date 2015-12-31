<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'email'=> $faker->email,
                'password'=> bcrypt('password'),
                'level' => $faker->randomElement([
                    'CP1','CP2',
                    'GINF1','GINF2','GINF3',
                    'GIND1','GIND2','GIND3',
                    'G3EI1','G3EI2','G3EI3',
                    'GSEA1','GSEA2','GSEA3',
                    'GSEA1','GSEA2','GSEA3',
                    'GSTR1','GSTR2','GSTR3'
                ]),
                'about' => $faker->paragraph(),
                'facebook' => 'http://facebook.com/'. $faker->word,
                'linkedin' => 'http://linedin.com/in/'. $faker->word,
                'twitter' => 'http://twitter.com/'. $faker->word,
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
