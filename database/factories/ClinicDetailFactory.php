<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day' => $this->faker->dayOfWeek,
            'time_from' => $this->faker->time(),
            'time_to' => $this->faker->time()
        ];
    }
}
