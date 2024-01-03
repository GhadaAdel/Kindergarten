<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->randomElement(['Community Educator', 'Librarian', 'Tutor', 'Artist', 'Linguist', 'Science Teacher', 'Guidance Counselor']),
            'fb' => fake()->domainName(),
            'x' => fake()->domainName(),
            'insta' => fake()->domainName(),
            'image' => fake()->imageUrl(800,600),
        ];
    }
}
