<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cpf' => $this->faker->numerify('###########'),
            'name' => $this->faker->name(),
            'birth_date' => $this->faker->dateTimeBetween('-70 years', '-18 years'),
            'has_comorbidity' => $this->faker->boolean(),
        ];
    }
}
