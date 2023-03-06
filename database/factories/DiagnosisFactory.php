<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Testing\File;

class DiagnosisFactory extends Factory
{
    const PATH = 'uploaded/diagnosis/';
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => File::fake()->create('diagnosis')->move(public_path(self::PATH))->getFilename()
        ];
    }
}
