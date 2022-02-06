<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nameProduct = $this->faker->word;
        return [
            'name' => $nameProduct,
            'description' => $this->faker->sentence,
            'price'  => $this->faker->numberBetween(1, 5000),
            'body'   => $this->faker->paragraphs(5, true),
            'slug'   => Str::slug($nameProduct)
        ];
    }
}
