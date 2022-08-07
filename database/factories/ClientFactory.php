<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElements([Client::SLUG_MALE, Client::SLUG_FEMALE])[0];
        return [
            'first_name' => $this->faker->firstName($gender),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'passport_no' => $this->faker->unique()->randomNumber(9, true),
            'gender' => $this->faker->randomElements([Client::SLUG_MALE, Client::SLUG_FEMALE])[0],
        ];
    }
}
