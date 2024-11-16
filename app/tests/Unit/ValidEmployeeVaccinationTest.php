<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Rules\ValidEmployeeVaccination;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ValidEmployeeVaccinationTest extends TestCase
{
    #[Test]
    public function rule_passes_with_valid_employee_vaccination_array()
    {
        $vaccines = [
            [
                'id_vaccine' => 1,
                'dose_date' => '2019-01-01',
                'dose_number' => 1,
            ],
        ];

        (new ValidEmployeeVaccination)->validate(
            attribute: 'vaccines',
            value: $vaccines,
            fail: fn () => $this->fail('The rule should pass.')
        );

        $this->assertTrue(true);
    }

    #[Test]
    public function rule_fails_empty_vaccines_array()
    {
        $vaccines = [];

        (new ValidEmployeeVaccination)->validate(
            attribute: 'vaccines',
            value: $vaccines,
            fail: fn () => $this->assertTrue(true)
        );
    }

    #[Test]
    public function rule_passes_should_not_validate_if_all_array_values_are_passed_as_null()
    {
        $vaccines = [
            [
                'id_vaccine' => null,
                'dose_date' => null,
                'dose_number' => null,
            ],
            [
                'id_vaccine' => null,
                'dose_date' => null,
                'dose_number' => null,
            ],
        ];

        (new ValidEmployeeVaccination)->validate(
            attribute: 'vaccines',
            value: $vaccines,
            fail: fn () => $this->fail('The rule should pass.')
        );

        $this->assertTrue(true);
    }

    #[Test]
    public function rule_passes_it_has_no_null_values_isolated()
    {
        $vaccines = [
            [
                'id_vaccine' => null,
                'dose_date' => null,
                'dose_number' => null,
            ],
            [
                'id_vaccine' => 1,
                'dose_date' => '2019-01-01',
                'dose_number' => 2,
            ],
        ];

        (new ValidEmployeeVaccination)->validate(
            attribute: 'vaccines',
            value: $vaccines,
            fail: fn () => $this->fail('The rule should pass.')
        );

        $this->assertTrue(true);
    }

    #[Test]
    public function rules_fails_with_employee_vaccination_partially_filled()
    {
        $vaccines = [
            [
                'id_vaccine' => 1,
                'dose_date' => null,
                'dose_number' => null,
            ],
            [
                'id_vaccine' => null,
                'dose_date' => null,
                'dose_number' => null,
            ],
        ];

        (new ValidEmployeeVaccination)->validate(
            attribute: 'vaccines',
            value: $vaccines,
            fail: fn () => $this->assertTrue(true)
        );
    }
}
