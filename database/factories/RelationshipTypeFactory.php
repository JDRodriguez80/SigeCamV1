<?php

namespace Database\Factories;

use App\Models\RelationshipType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RelationshipType>
 */
class RelationshipTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RelationshipType::class;
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->word(),
            'name' => $this->faker->randomElement([
                'Padre',
                'Madre',
                'Hermano(a)',
                'Abuelo',
                'Abuela',
                'Tutor Legal',
                'Familiar'
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
