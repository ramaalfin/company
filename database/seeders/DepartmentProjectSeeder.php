<?php

namespace Database\Seeders;

use App\Models\DepartmentProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartmentProject::factory()->count(20)->create();
    }
}
