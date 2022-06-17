<?php

namespace Database\Factories;

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
            'name' => "dummy_product",
            'value' => 100000,
            'description' => $this->faker->sentence(mt_rand(10,25)),
            'user_id' => mt_rand(1,4),
            'category_id' => mt_rand(1,4),
        ];
    }
}
