<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'logo' => $this->faker->imageUrl(180, 180),
            'cover' => $this->faker->imageUrl(1280, 720),
            'subdomain' => $this->faker->slug
        ];
    }
}
