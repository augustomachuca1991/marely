<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->numberBetween(1000000000000, 9999999999999),
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->sentence(5),
            'stock' => $this->faker->numberBetween(5, 30),
            'list_price' => $this->faker->numberBetween(50, 3000),
            'sale_price' => $this->faker->numberBetween(50, 2000),
            'category_id' => $this->faker->numberBetween(1, 4),
            // 'profile_photo_path' =>

        ];
    }
}
