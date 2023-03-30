<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departments = ['Developer', 'Designer', 'SEO'];
        return [
            'name' => $this->faker->unique()->randomElement($departments),
            'kepala_department' => $this->faker->name
        ];
    }
}
