<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaccine>
 */
class VaccineFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Vaccine::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Pfizer', 'AstraZeneca', 'Johnson']),
            'batch' => strtoupper($this->faker->bothify('##?###?')),
            'expiration_date' => $this->faker->dateTimeBetween('+1 year', '+3 years'),
        ];
    }
}
