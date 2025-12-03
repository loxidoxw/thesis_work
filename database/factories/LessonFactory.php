<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['lecture', 'assignment']);
        return [
            'section_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->title(),
            'content' => $type === 'lecture'
              ? [
                'file_url' => 'https://drive.google.com/file/d/1yqe3o1CYC0Y9szzIalhszZx-tGCht6d9/view',
                ]
                :[
                    'file_url' => 'https://drive.google.com/file/d/1vSNCsGf6_qYqS5dOvTnq5hCmJVqchfwX/view',
                    'deadline' => '2025-11-23'
                 ],
            'type' => $type,
            'order' => $this->faker->numberBetween(1, 10),

        ];
    }
}
