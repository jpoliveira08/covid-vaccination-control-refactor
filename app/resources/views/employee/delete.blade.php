@extends('layout.layout')

@section('title')
    Remove Employee
@endsection
@section('content')
    @section('page_title')
        Remove Employee
    @endsection
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="employee-name" class="form-label">Name</label>
            <input type="text" class="form-control" id="employee-name" name="name" value="{{ $employee->name }}" disabled>
        </div>
        <div class="col-md-2">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="employee-cpf" name="cpf" value="{{ formatCpf($employee->cpf) }}" disabled>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="birth-date" class="form-label">Birth date</label>
            <input type="date" class="form-control" id="birth-date" name="birth_date" value="{{ $employee->birth_date }}" disabled>
        </div>
    </div>
    <div class="row mb-4 ms-1">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" value="{{ $employee->has_comorbidity }}" @if($employee->has_comorbidity) checked @endif disabled>
            <label class="form-check-label" for="has_comorbidity">Has comorbidity</label>
        </div>
    </div>
    <hr>
    <h2>Vaccines</h2>
    <div id="vaccineRepeaterContainer" class="mt-2">
        @forelse($employee->vaccines as $key => $vaccination)
            <div class="row mb-4 vaccine-repeater-item">
                <div class="col-md-7">
                    <label class="form-label d-block">Vaccine description</label>
                    <select class="form-select" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top" disabled>
                        <option selected>
                            {{ "Name: {$vaccination->name}, Batch: {$vaccination->batch}, Expiration date: {$vaccination->expiration_date}" }}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Dose date</label>
                    <input type="date" class="form-control" name="vaccines[{{$key}}][dose_date]" value="{{ $vaccination->pivot->dose_date }}" disabled>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Dose number</label>
                    <input type="number" class="form-control" name="vaccines[{{$key}}][dose_number]" value="{{ $vaccination->pivot->dose_number }}" disabled>
                </div>
            </div>
        @empty
            <div class="alert alert-warning">
                No vaccination yet
            </div>
        @endforelse
    </div>

    <div class="row mb-4">
        <div class="col-md-1">
            <a href="{{ route('employee.index') }}" type="button" class="btn btn-secondary" id="backButton">Back</a>
        </div>
        <div class="col-md-2">
            <form action="{{ route('employee.destroy', ['employee' => $employee]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection


