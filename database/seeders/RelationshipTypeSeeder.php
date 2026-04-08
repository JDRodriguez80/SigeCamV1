<?php

namespace Database\Seeders;

use App\Models\RelationshipType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class RelationshipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relationshipTypes = [
            ['code' => 'FATHER', 'name' => 'Padre'],
            ['code' => 'MOTHER', 'name' => 'Madre'],
            ['code' => 'BROSIS', 'name' => 'Hermano(a)'],
            ['code' => 'ABU', 'name' => 'Abuelo'],
            ['code' => 'ABUA', 'name' => 'Abuela'],
            ['code' => 'LEGAL', 'name' => 'Tutor Legal'],
            ['code' => 'FAMILY', 'name' => 'Familiar'],
        ];
        foreach ($relationshipTypes as $relationshipType) {
            RelationshipType::create($relationshipType);
        }
    }
}
