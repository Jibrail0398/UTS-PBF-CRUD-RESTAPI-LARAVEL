<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'name' => fake()->sentence(1),
            'price' => random_int(1000, 100000),
            'category_id' => random_int(1, 4),
            'expired_at' => date('Y-m-d', strtotime('+1 year')),
            'modified_by' => 'admin@mail.com',

        ];
    }
}
