<?php

namespace Database\Factories;

use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentType>
 */
class PaymentTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PaymentType::class;
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->bothify('??-##'),
            'name' => $this->faker->randomElement([
                'Efectivo',
                'Transferencia',
                'Tarjeta de credito',
                'Tarjeta de debito',
                'Beca',
                'Otro',
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
