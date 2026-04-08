<?php

namespace Database\Factories;

use App\Models\DisabilityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DisabilityType>
 */
class DisabilityTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = DisabilityType::class;
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->bothify('??-##'),
            'name' => $this->faker->randomElement([
                'Sordo',
                'Hipoacusia',
                'Discapacidad Mental',
                'Discapacidad Intelectual',
                'Discapacidad Motora',
                'Discapacidad Múltiple',
                'Trastorno del Espectro Autista',
                'Dificultad Severa de Aprendizaje',
                'Dificultad Severa de Conducta',
                'Dificultad Severa de Comunicacion'
            ]),
        ];
    }
    public function withCode(string $code): self
    {
        return $this->state(function (array $attributes) use ($code) {
            return [
                'code' => $code,
            ];
        });
    }
}
