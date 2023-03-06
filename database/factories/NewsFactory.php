<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Testing\File;

class NewsFactory extends Factory
{
    const PATH = 'uploaded/news/';
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'image' => File::fake()->create('news')->move(public_path(self::PATH))->getFilename(),
            'date' => $this->faker->date,
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph
        ];
    }
}
