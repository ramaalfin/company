<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projects = ['Design Website with HTML, CSS, JS', 'Create Blog Post', 'Create E-Commerce', 'Create Human Resource Information System'];
        return [
            'name' => $this->faker->randomElement($projects),
            'description' => $this->faker->text(),
            'start_date' => $this->faker->dateTimeBetween('-12 days', '-10 days'), //todo ubah
            'end_date' => $this->faker->dateTimeBetween('-5 days', '-4 days'), //todo ubah
            'finish_date' => $this->faker->dateTimeBetween('-8 days', '-6 days'), //todo ubah
        ];
    }
}
