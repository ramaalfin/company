<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DepartmentProject>
 */
class DepartmentProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id' => $this->faker->numberBetween(1, Department::count()),
            'project_id' => $this->faker->numberBetween(1, Project::count())
        ];
    }
}
