<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Hash;

class DoctorFactory extends Factory
{
    const PATH = 'uploaded/doctor/';
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            'image' => File::fake()->create('doctor')->move(public_path(self::PATH))->getFilename(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'highest_certificate' => $this->faker->randomElement(['msc', 'md', 'diploma', 'mbbch']),
            'syndicate_number' => $this->faker->numberBetween(1),
            'description' => $this->faker->paragraphs(3, true),
            'medical_syndicate_card' => File::create('card')->move(public_path(self::PATH))->getFileName(),
            'status' => $this->faker->randomElement(['under_review', 'available'])
        ];
    }
}
