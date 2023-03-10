<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CertificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'certificate' => $this->faker->word,
            'place' => $this->faker->city,
            'date' => $this->faker->date
        ];
    }
}
