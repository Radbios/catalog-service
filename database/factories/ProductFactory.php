<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->word(),  
            'price' => $this->faker->randomFloat(2, 1, 100),  
            'description' => $this->faker->sentence(),  
            'image_url' => $this->faker->imageUrl(),  

            'height' => $this->faker->randomFloat(2, 5, 50), 
            'width' => $this->faker->randomFloat(2, 5, 50),  
            'length' => $this->faker->randomFloat(2, 5, 50), 
            'weight' => $this->faker->randomFloat(2, 0.1, 5),
        ];
    }
}
