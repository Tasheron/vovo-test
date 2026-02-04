<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'price' => $this->faker->randomFloat(2, 100, 5000),
            'category_id' => Category::inRandomOrder()->first()->id,
            'in_stock' => $this->faker->boolean(70),
            'rating' => $this->faker->randomFloat(1, 1, 5),
        ];
    }
}