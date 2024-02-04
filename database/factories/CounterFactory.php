<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key'=> 'invoice',
            'prefix'=> 'INV-',
            'value'=> 20000,
        ];
    }
}
