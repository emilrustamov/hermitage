<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'title_ru' => fake()->sentence(6),
           'title_en' => fake()->sentence(6),
           'title_tk' => fake()->sentence(6),
           'description_tk' => fake()->paragraph(),
           'description_ru' => fake()->paragraph(),
           'description_en' => fake()->paragraph(),
           'is_active' => fake()->boolean(),
           'created_at' => fake()->date(),
           'updated_at' => fake()->date(),
        ];
    }
}
