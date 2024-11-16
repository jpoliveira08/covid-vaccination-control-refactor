<?php

declare(strict_types=1);

namespace App\Livewire\Tables;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

final class EmployeeTable extends PowerGridComponent
{
    public string $tableName = 'employees';

    public function setUp(): array
    {
        return [
            PowerGrid::footer()
                ->showRecordCount(mode: 'full')
                ->showPerPage(perPage: 10, perPageValues: [0, 50, 100, 500]),
            PowerGrid::header()
                ->showSearchInput(),
        ];
    }

    public function datasource(): Builder
    {
        return Employee::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('name')
            ->add('cpf', fn (Employee $model) => formatCpf($model->cpf))
            ->add('birth_date');
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('CPF', 'cpf')
                ->sortable()
                ->searchable(),
            Column::make('Birth Date', 'birth_date'),
            Column::action('Action'),
        ];
    }

    public function actions(Employee $row): array
    {
        return [
            Button::add('show')
                ->slot('<i class="fa-solid fa-eye"></i>')
                ->class('btn btn-light btn-sm')
                ->route('employee.show', ['employee' => $row->id]),
            Button::add('edit')
                ->slot('<i class="fa-solid fa-pen-to-square"></i>')
                ->class('btn btn-primary btn-sm')
                ->route('employee.edit', ['employee' => $row->id]),
            Button::add('delete')
                ->slot('<i class="fa-solid fa-trash"></i>')
                ->class('btn btn-danger btn-sm')
                ->route('employee.delete', ['employee' => $row->id]),
        ];
    }
}
