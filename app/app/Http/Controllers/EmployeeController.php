<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Contracts\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        return view('employee.index');
    }

    public function show(Employee $employee): View
    {
        return view('employee.show', compact('employee'));
    }

    public function create(): View
    {
        return view('employee.create');
    }

    public function edit(Employee $employee): View
    {
        return view('employee.edit', compact('employee'));
    }

    public function delete(Employee $employee): View
    {
        return view('employee.delete', compact('employee'));
    }

    public function store(StoreEmployeeRequest $request, EmployeeService $employeeService)
    {
        try {
            $employeeService->store($request->validated());
        } catch (\Exception $exception) {
            if ($exception->getCode() === '23000') {
                return to_route('employee.create')->with('error', 'This CPF is already registered.');
            }

            return to_route('employee.create')->with('error', 'Contact system administrator.');
        }

        return to_route('employee.index');
    }

    public function update(
        UpdateEmployeeRequest $request,
        Employee $employee,
        EmployeeService $employeeService
    ) {
        $employeeService->update($request->validated(), $employee);

        return to_route('employee.index')
            ->with('message', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee, EmployeeService $employeeService)
    {
        $employeeService->destroy($employee);

        return to_route('employee.index')
            ->with('message', 'Employee deleted successfully');
    }
}
