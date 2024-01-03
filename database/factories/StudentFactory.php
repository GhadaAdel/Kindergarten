<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_name' => fake()->name(),
            'guardian_name' => fake()->name(),
            'student_age' => fake()->numberBetween($min= 4, $max=15),
            'guardian_mail' => fake()->unique()->safeEmail(),
            'message' => fake()->text(),
        ];
    }
}
