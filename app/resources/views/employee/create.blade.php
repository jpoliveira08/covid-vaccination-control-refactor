@extends('layout.layout')

@section('title')
    Create Employee
@endsection
@section('content')
    @section('page_title')
        Create Employee
    @endsection
<x-employee.form action="{{ route('employee.store') }}">
    <x-slot:method>
        @method('POST')
    </x-slot:method>
    <x-slot:inputEmployeeName>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="employee-name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </x-slot:inputEmployeeName>
    <x-slot:inputEmployeeCpf>
        <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="employee-cpf" name="cpf"  value="{{ old('cpf') }}" required>
        @error('cpf')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </x-slot:inputEmployeeCpf>
    <x-slot:inputEmployeeBirthDate>
        <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth-date" name="birth_date" value="{{ old('birth_date') }}" required>
        @error('birth_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </x-slot:inputEmployeeBirthDate>
    <x-slot:inputEmployeeHasComorbidity>
        <input type="checkbox" class="form-check-input @error('has_comorbidity') is-invalid @enderror" id="has-comorbidity" name="has_comorbidity @checked(old('has_comorbidity'))">
        @error('has_comorbidity')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </x-slot:inputEmployeeHasComorbidity>
    <x-slot:vaccineContainer>
        <x-employee.vaccination-form :vaccinations="old('vaccines', [])"/>
    </x-slot:vaccineContainer>
</x-employee.form>

@endsection
@push('scripts')
    @vite('resources/js/employee/index.js')
@endpush

