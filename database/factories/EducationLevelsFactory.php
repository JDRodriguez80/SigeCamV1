<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EducationLevels;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EducationLevelsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EducationLevels::class;
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->bothify('??-##'),
            'name' => $this->faker->randomElement([
                'Primaria',
                'Secundaria',
                'Preparatoria',
                'Profesional',
                'Técnica',
                'Sin escolaridad'
            ]),
            'order_index' => $this->faker->numberBetween(1, 10),
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
