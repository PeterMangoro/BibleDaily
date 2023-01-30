<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reading>
 */
class ReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bible_session_id'=>rand(),
            'verse'=>fake()->text,
            'notes' =>fake()->sentence.'*'.fake()->sentence.'*'.fake()->sentence,
            'prayer_points' =>fake()->sentence.'*'.fake()->sentence.'*'.fake()->sentence,
            'prayer' =>fake()->sentence
        ];
    }
}
