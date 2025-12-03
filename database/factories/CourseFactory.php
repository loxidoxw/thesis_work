<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $teacher_id = \App\Models\User::factory()->state(['role' => 'teacher']);

        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'teacher_id' => $teacher_id,
            'image' => 'courses/thumbnails/test_thumbnail.png'
        ];
    }
}
