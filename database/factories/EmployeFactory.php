<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => $this->faker->unique()->numerify('10######'),
            'fullname' => $this->faker->firstName() . " " . $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'address' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'department_id' => $this->faker->numberBetween(1, 3)
        ];
    }
}
