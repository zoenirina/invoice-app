<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname'=> $this->faker->name,
            'lastname'=> $this->faker->name,
            'email'=> $this->faker->email,
            'tel'=> "0".rand(340000000,3499999999),
            'address'=> $this->faker->address,
        ];
    }
}
