<?php

namespace Database\Factories;

use App\Models\Employe;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeProject>
 */
class EmployeProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employe_id' => $this->faker->numberBetween(1, Employe::count()),
            'project_id' => $this->faker->numberBetween(1, Project::count())
        ];
    }
}
