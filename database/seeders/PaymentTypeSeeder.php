<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentType;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentTypes = [
            ['code' => 'EFE', 'name' => 'Efectivo'],
            ['code' => 'TRA', 'name' => 'Transferencia'],
            ['code'=>'TDC', 'name'=>'Tarjeta de Credito'],
            ['code'=>'TDD', 'name'=>'Tarjeta de Debito'],
            ['code'=>'BEC', 'name'=>'Beca'],
            ['code'=>'OTR', 'name'=>'Otro'],
        ];
        foreach ($paymentTypes as $paymentType) {
            PaymentType::create($paymentType);
        }
    }
}
