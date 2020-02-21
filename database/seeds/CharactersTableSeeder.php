<?php

use App\Moduls\Character;
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

        Character::create([
            'user_id' => 1,
            'name' => $faker->name, 
            'home_village' => 'Konoha', 
            'current_location' => 'Konoha', 
            'faction' => 'Konoha', 
            'age' => '18',
        ]);
    }
}
