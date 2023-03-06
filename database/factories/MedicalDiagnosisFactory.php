<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalDiagnosisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'degree' => $this->faker->randomElement(['Other_Skin_Disease', 'Monkey_Pox', 'Normal'])
        ];
    }
}
