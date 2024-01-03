<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startHour = $this->faker->numberBetween(8, 11);
        $endHour = $this->faker->numberBetween($startHour+1, 15);
        
        return [
            'class_subject' => fake()->randomElement(['Mathematics', 'History', 'Science', 'English', 'Color Management', 'Arts', 'General Knowledge', 'Athletics and Dance', 'Creativity', 'Music']),
            'min_age' =>fake()->numberBetween($min = 4, $max = 7),
            'max_age' =>fake()->numberBetween($min = 8, $max = 15),
            'start_time' => sprintf('%02d:00:00', $startHour),
            'end_time' => sprintf('%02d:00:00', $endHour),
            'price' =>fake()->numberBetween($min= 200, $max=2500),
            'capacity' =>fake()->numberBetween($min = 15, $max = 35),
            'teacher_id' => fake()->numberBetween($min = 1, $max = 10),
            'image' => fake()->imageUrl(600,800),
        ];
    }
}
