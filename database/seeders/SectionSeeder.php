<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            ['code' => 'MAT', 'name' => 'Maternal'],
            ['code' => 'PRE', 'name' => 'Preescolar'],
            ['code' => 'PRI', 'name' => 'Primaria'],
            ['code' => 'SEC', 'name' => 'Secundaria'],
            ['code' => 'LAB', 'name' => 'Laboral'],
            ['code' => 'AC', 'name' => 'Atencion Complementaria'],
        ];
        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
