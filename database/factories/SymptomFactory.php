<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SymptomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'symptom' => $this->faker->unique()->word
        ];
    }
}
