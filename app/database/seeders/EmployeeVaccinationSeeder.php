<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Vaccine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class EmployeeVaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory(10)
            ->hasAttached(
                Vaccine::factory()->count(1),
                [
                    'dose_number' => rand(1, 4),
                    'dose_date' => Arr::random(['2022-05-06', '2023-08-08', '2024-01-01', '2024-10-10']),
                ]
            )
            ->create();
    }
}
