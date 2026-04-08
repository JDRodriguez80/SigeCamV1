<?php

namespace Database\Seeders;

use App\Models\DisabilityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisabilityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $disabilityTypes = [
            ['code' => 'SO', 'name' => 'Sordo'],
            ['code' => 'HP', 'name' => 'Hipoacusia'],
            ['code' => 'DM', 'name' => 'Discapacidad Mental'],
            ['code' => 'DI', 'name' => 'Discapacidad Intelectual'],
            ['code' => 'DMO', 'name' => 'Discapacidad Motora'],
            ['code'=>'TEAC', 'name'=>'Trastorno del Espectro Autista'],
            ['code'=>'DSA', 'name'=>'Dificultad Severa de Aprendizaje'],
            ['code'=>'DSC', 'name'=>'Dificultad Severa de Conducta'],
            ['code'=>'DSCO', 'name'=>'Dificultad Severa de Comunicacion'],
        ];
        foreach ($disabilityTypes as $disabilityType) {
            DisabilityType::create($disabilityType);
        }
    }
}
