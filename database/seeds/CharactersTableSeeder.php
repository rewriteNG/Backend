<?php

use App\Moduls\Character\CharBase;
use Illuminate\Database\Seeder;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        CharBase::create([
            'user_id' => 1,
            'name' => $faker->name,
            'home_village' => 'Konoha',
            'current_location' => 'Konoha',
            'faction' => 'Konoha',
            'age' => '18',
        ]);
        CharBase::create([
            'user_id' => 1,
            'name' => $faker->name,
            'home_village' => 'Landlos',
            'current_location' => 'Konoha',
            'faction' => 'Konoha',
            'gender' => 'w',
            'age' => '35',
        ]);
    }
}
