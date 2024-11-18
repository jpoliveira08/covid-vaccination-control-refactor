@extends('layout.layout')

@section('title')
    Edit Employee
@endsection
@section('content')
    @section('page_title')
        Edit Employee
    @endsection
    <x-employee.form action="{{ route('employee.update', $employee->id) }}">
        <x-slot:method>
            @method('PUT')
        </x-slot:method>
        <x-slot:inputEmployeeName>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="employee-name" name="name" value="{{ old('name', $employee->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </x-slot:inputEmployeeName>
        <x-slot:inputEmployeeCpf>
            <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="employee-cpf" name="cpf"  value="{{ formatCpf(old('cpf', $employee->cpf)) }}" required>
            @error('cpf')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </x-slot:inputEmployeeCpf>
        <x-slot:inputEmployeeBirthDate>
            <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth-date" name="birth_date" value="{{ old('birth_date', $employee->birth_date) }}" required>
            @error('birth_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </x-slot:inputEmployeeBirthDate>
        <x-slot:inputEmployeeHasComorbidity>
            <input type="checkbox" class="form-check-input @error('has_comorbidity') is-invalid @enderror" @checked(old('has_comorbidity', $employee->has_comorbidity)) value="{{ old('has_comorbidity', $employee->has_comorbidity) }}" id="has-comorbidity" name="has_comorbidity">
            @error('has_comorbidity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </x-slot:inputEmployeeHasComorbidity>
        <x-slot:vaccineContainer>
            <x-employee.vaccination-form :vaccinations="$vaccinations"/>
        </x-slot:vaccineContainer>
    </x-employee.form>
@endsection
@push('scripts')
    @vite('resources/js/employee/index.js')
@endpush

