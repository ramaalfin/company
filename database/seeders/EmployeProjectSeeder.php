<?php

namespace Database\Seeders;

use App\Models\EmployeProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeProject::factory()->count(20)->create();
    }
}
