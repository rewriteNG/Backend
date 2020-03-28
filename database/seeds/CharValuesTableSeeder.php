<?php

use App\Moduls\Character\CharValue;
use Illuminate\Database\Seeder;

class CharValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        CharValue::create([
            'user_id' => 1,
            'char_id' => 1,
            'str' => $faker->randomNumber(),
            'def' => $faker->randomNumber(),
            'speed' => $faker->randomNumber(),
            'stamina' => $faker->randomNumber(),
            'chakra' => $faker->randomNumber(),
            'tai' => 4,
            'nin' => 6,
            'gen' => 10,
            'learn' => 1.2,
            'elements' => [
                '1' => 'wasser'
            ]
        ]);
        CharValue::create([
            'user_id' => 1,
            'char_id' => 2,
            'str' => $faker->randomNumber(),
            'def' => $faker->randomNumber(),
            'speed' => $faker->randomNumber(),
            'stamina' => $faker->randomNumber(),
            'chakra' => $faker->randomNumber(),
            'tai' => 5,
            'nin' => 1,
            'gen' => 8,
            'learn' => 0.8,
            'elements' => [
                '1' => 'feuer'
            ]
        ]);
    }
}
