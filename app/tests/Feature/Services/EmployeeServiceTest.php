<?php

declare(strict_types=1);

namespace Tests\Feature\Services;

use App\Models\Employee;
use App\Models\Vaccine;
use App\Services\EmployeeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EmployeeServiceTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_an_employee_without_vaccine()
    {
        $employeeData = [
            'name' => 'John Doe',
            'cpf' => '22892680034',
            'birth_date' => '1990-01-01',
            'has_comorbidity' => false,
        ];

        $employeeService = new EmployeeService;
        $employeeService->store($employeeData);

        $this->assertEquals(1, Employee::count());
        $employee = Employee::first();
        $this->assertEquals($employeeData['name'], $employee->name);
        $this->assertEquals($employeeData['cpf'], $employee->cpf);
        $this->assertEquals($employeeData['birth_date'], $employee->birth_date);
        $this->assertEquals($employeeData['has_comorbidity'], $employee->has_comorbidity);
    }

    #[Test]
    public function it_can_create_an_employee_with_vaccine()
    {
        $vaccine = Vaccine::factory()->create();

        $employeeData = [
            'name' => 'John Doe',
            'cpf' => '22892680034',
            'birth_date' => '1990-01-01',
            'has_comorbidity' => false,
            'vaccines' => [
                [
                    'id_vaccine' => null,
                    'dose_date' => null,
                    'dose_number' => null,
                ],
                [
                    'id_vaccine' => $vaccine->id,
                    'dose_date' => '2019-01-01',
                    'dose_number' => 2,
                ],
            ],
        ];

        $employeeService = new EmployeeService;
        $employeeService->store($employeeData);
        $employee = Employee::first();
        $vaccine = Vaccine::first();
        $this->assertEquals(1, Employee::count());
        $this->assertEquals(1, Vaccine::count());
    }

    #[Test]
    public function it_can_update_an_employee()
    {
        $employee = Employee::factory()->create();
        $employeeData = [
            'name' => 'John Doe',
            'cpf' => '22892680034',
            'birth_date' => '1990-01-01',
            'has_comorbidity' => false,
        ];

        $employeeService = new EmployeeService;
        $employeeService->update($employeeData, $employee);

        $this->assertEquals(1, Employee::count());
        $employee = Employee::first();
        $this->assertEquals($employeeData['name'], $employee->name);
        $this->assertEquals($employeeData['cpf'], $employee->cpf);
        $this->assertEquals($employeeData['birth_date'], $employee->birth_date);
        $this->assertEquals($employeeData['has_comorbidity'], $employee->has_comorbidity);
    }

    #[Test]
    public function it_can_delete_an_employee()
    {
        $employee = Employee::factory()->create();
        $this->assertEquals(1, Employee::count());

        $employeeService = new EmployeeService;
        $employeeService->destroy($employee);

        $this->assertEquals(0, Vaccine::count());
    }
}
