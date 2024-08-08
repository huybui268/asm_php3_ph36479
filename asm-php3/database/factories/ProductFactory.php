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
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image' => '',
            'description' => $this->faker->paragraph,
            'price' => rand(100000, 129000),
            'price_sale' => rand(75000, 100000),
            'size' => fake()->randomElement(['S', 'M', 'L', 'XL']),
            'color' => fake()->randomElement(['Red', 'Blue', 'Green', 'Black', 'White']),
            'category_id' => rand(1, 5),
        ];
    }
}
