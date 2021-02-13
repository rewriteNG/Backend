<?php

namespace Database\Factories;

use App\Moduls\Character\CharBase;
use App\Moduls\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharBaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharBase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->name,
            'home_village' => 'Konoha',
            'current_location' => 'Konoha',
            'faction' => 'Konoha',
            'age' => $this->faker->randomDigit,
        ];
    }
}
