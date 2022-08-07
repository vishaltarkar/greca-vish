<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'type' => $this->faker->randomElements([Product::SLUG_EXCURSIONS, Product::SLUG_CUSTOM_PACKAGES, Product::SLUG_CRUISES_AND_TRANFERS])[0],
            'description' => $this->faker->paragraph(),
            'capacity' => rand(1, 100),
        ];
    }
}
