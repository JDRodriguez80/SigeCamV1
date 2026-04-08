<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Section::class;
    public function definition(): array
    {
        return [
            'code'=>$this->faker->unique()->bothify('??-##'),
            'name'=>$this->faker->randomElement([
                'Maternal',
                'Preescolar',
                'Primaria',
                'Secundaria',
                'Laboral',
                'Atencion Complementaria',
            ])
        ];
    }

    public function withCode(string $code):self
    {
        return $this->state(function (array $attributes) use ($code) {
          return [
              'code' => $code,
          ];
        });
    }
}
