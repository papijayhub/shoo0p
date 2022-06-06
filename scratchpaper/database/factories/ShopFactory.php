<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl($width=640, $height=480, 'cats'),
            'category' => $this->faker->randomElement(["CC104", "DC194","ERD145","INSTI2","MAIN100"]),
            'product_name' => $this->faker->text($maxNbChars = 50),
            'price' => $this->faker->numberBetween($min = 1500, $max = 6000),
            'description' => $this->faker->text($maxNbChars = 50),

        ];
    }
}
