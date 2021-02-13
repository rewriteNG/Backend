<?php

namespace Database\Factories;

use App\Moduls\Character\CharBase;
use App\Moduls\Character\CharValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharValue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'char_id' => 1,
            'user_id' => 1,
            'str' => $this->faker->randomNumber(),
            'def' => $this->faker->randomNumber(),
            'speed' => $this->faker->randomNumber(),
            'stamina' => $this->faker->randomNumber(),
            'chakra' => $this->faker->randomNumber(),
            'tai' => 4,
            'nin' => 6,
            'gen' => 10,
            'learn' => 1.2,
            'elements' => [
                '1' => 'wasser'
            ]
        ];
    }
}
