<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_renders_employee_index_view()
    {
        $this->get(route('employee.index'))
            ->assertStatus(200)
            ->assertViewIs('employee.index');
    }

    #[Test]
    public function it_can_renders_employee_create_view()
    {
        $this->get(route('employee.create'))
            ->assertStatus(200)
            ->assertViewIs('employee.create');
    }

    #[Test]
    public function it_can_renders_employee_show_view()
    {
        $employee = Employee::factory()->create();

        $this->get(route('employee.show', ['employee' => $employee->id]))
            ->assertStatus(200)
            ->assertViewIs('employee.show');
    }

    #[Test]
    public function it_can_renders_employee_delete_view()
    {
        $employee = Employee::factory()->create();

        $this->get(route('employee.delete', ['employee' => $employee->id]))
            ->assertStatus(200)
            ->assertViewIs('employee.delete');
    }

    #[Test]
    public function it_can_renders_employee_edit_view()
    {
        $employee = Employee::factory()->create();

        $this->get(route('employee.edit', ['employee' => $employee->id]))
            ->assertStatus(200)
            ->assertViewIs('employee.edit');
    }

    #[Test]
    public function it_creates_employee_without_vaccine(): void
    {
        $this->withoutExceptionHandling();

        $response = $this
            ->followingRedirects()
            ->post(route('employee.store'), [
                'name' => 'Joao',
                'cpf' => '08190242016',
                'birth_date' => '2027-11-06',
            ]);

        $employee = Employee::first();
        $this->assertEquals(1, Employee::count());
        $this->assertEquals('Joao', $employee->name);
        $this->assertEquals('08190242016', $employee->cpf);
        $this->assertEquals('2027-11-06', $employee->birth_date);
    }
}
