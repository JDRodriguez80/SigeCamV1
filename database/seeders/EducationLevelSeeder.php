<?php

namespace Database\Seeders;

use App\Models\EducationLevels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educationLevels = [
            ['code' => 'PRI', 'name' => 'Primaria', 'order_index' => 1],
            ['code' => 'SEC', 'name' => 'Secundaria', 'order_index' => 2],
            ['code' => 'PREP', 'name' => 'Preparatoria', 'order_index' => 3],
            ['code' => 'PROF', 'name' => 'Profesional', 'order_index' => 4],
            ['code' => 'TEC', 'name' => 'Técnica', 'order_index' => 5],
            ['code' => 'SIN', 'name' => 'Sin escolaridad', 'order_index' => 6],
        ];
        foreach ($educationLevels as $level) {
            EducationLevels::create($level);
        }
    }
}
