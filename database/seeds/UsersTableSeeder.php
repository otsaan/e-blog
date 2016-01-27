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
        foreach (range(1,8) as $index) {
            DB::table('users')->insert([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'username' => $faker->firstName,
                'photo' => 'noavatar.jpg',
                'email'=> $faker->email,
                'cne'=> strtoupper(str_random(10). $index),
                'role'=> $faker->randomElement(['prof','eleve']),
                'confirmed'=> 1,
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

        DB::table('users')->insert([
            'firstName' => 'eleve',
            'lastName' => 'eleve',
            'username' => 'eleve',
            'confirmed'=> 1,
            'cne'=> 'd984932',
            'email'=> 'eleve@eleve.com',
            'role'=> 'eleve',
            'password'=> bcrypt('password'),
            'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')
        ]);

        DB::table('users')->insert([
            'firstName' => 'prof',
            'lastName' => 'prof',
            'username' => 'prof',
            'confirmed'=> 1,
            'cin'=> '12121AS',
            'email'=> 'prof@prof.com',
            'role'=> 'prof',
            'password'=> bcrypt('password'),
            'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')
        ]);

    }
}
