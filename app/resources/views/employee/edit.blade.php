@extends('layout.layout')

@section('title')
    Edit Employee
@endsection
@section('content')
    @section('page_title')
        Edit Employee
    @endsection
    <form action="{{ route('employee.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="employee-name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="employee-name" name="name" value="{{ old('name', $employee->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="employee-cpf" name="cpf"  value="{{ formatCpf(old('cpf', $employee->cpf)) }}" required>
                @error('cpf')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="birth-date" class="form-label">Birth date</label>
                <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth-date" name="birth_date" value="{{ old('birth_date', $employee->birth_date) }}" required>
                @error('birth_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-4 ms-1">
            <div class="form-check">
                <input type="checkbox" class="form-check-input @error('has_comorbidity') is-invalid @enderror" @checked(old('has_comorbidity', $employee->has_comorbidity)) id="has-comorbidity" name="has_comorbidity">
                <label class="form-check-label" for="has_comorbidity">Has comorbidity</label>
                @error('has_comorbidity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <hr>
        <h2>Vaccines</h2>
        @error('vaccines')
        <div class="alert alert-danger">
            Please check the vaccination details entered and try again.
        </div>
        @enderror
        <div id="vaccineRepeaterContainer">
            @php($vaccines = old('vaccines') ?? $employee->vaccines->toArray())
            @php($alreadyHasVaccination = array_filter($vaccines, function ($vaccine) {
                if (array_key_exists('pivot', $vaccine) || (array_key_exists('id_vaccine', $vaccine))) {
                    return true;
                }

                return false;
            }))
            @if($alreadyHasVaccination)
                @foreach($vaccines as $i => $vaccine)
                    <input type="hidden" name="vaccineNameOld" value="{{ old('vaccineNameOld', isset($vaccine['name']) ? $vaccine['name'] : '') }}">
                    <input type="hidden" name="vaccineBatchOld" value="{{ old('vaccineBatchOld', isset($vaccine['batch']) ? $vaccine['batch'] : '') }}">
                    <input type="hidden" name="vaccineExpirationDateOld" value="{{ old('vaccineExpirationDateOld', isset($vaccine['expiration_date']) ? $vaccine['expiration_date'] : '') }}">
                    <div class="row mb-4 vaccine-repeater-item">
                        <div class="col-md-6">
                            <label class="form-label d-block">Vaccine description</label>
                            <div
                                class="vaccineSelect"
                                data-vaccine-id="{{ isset($vaccine['pivot']) ? $vaccine['pivot']['id_vaccine'] : $vaccine['id_vaccine'] }}"
                                data-vaccine-name="{{ isset($vaccine['pivot']) ? $vaccine['pivot']['id_vaccine'] : old('vaccineNameOld') }}"
                                data-vaccine-batch="{{ isset($vaccine['pivot']) ? $vaccine['batch'] : old('vaccineBatchOld') }}"
                                data-vaccine-expiration-date="{{ isset($vaccine['pivot']) ? $vaccine['expiration_date'] : old('vaccineExpirationDateOld') }}"
                                data-input-name="vaccines[{{ $i }}][id_vaccine]"
                            ></div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Dose date</label>
                            <input type="date" class="form-control" name="vaccines[{{$i}}][dose_date]" value="{{ isset($vaccine['pivot']) ? $vaccine['pivot']['dose_date'] : $vaccine['dose_date'] }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Dose number</label>
                            <input type="number" class="form-control" name="vaccines[{{$i}}][dose_number]" value="{{ isset($vaccine['pivot']) ? $vaccine['pivot']['dose_number'] : $vaccine['dose_number'] }}">
                        </div>
                        <div class="col-md-1">
                            <label class="form-label"></label>
                            @if($i > 0)
                                <button type="button" class="btn btn-danger form-control mt-2 remove-vaccine" onclick="deleteRow(event)">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            @else
                                <button type="button" class="btn btn-primary form-control mt-2 add-vaccine">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row mb-4 vaccine-repeater-item">
                    <div class="col-md-6">
                        <label class="form-label d-block">Vaccine description</label>
                        <div class="vaccineSelect" data-input-name="vaccines[0][id_vaccine]"></div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Dose date</label>
                        <input type="date" class="form-control" name="vaccines[0][dose_date]">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Dose number</label>
                        <input type="number" class="form-control" name="vaccines[0][dose_number]">
                    </div>
                </div>
            @endif
        </div>
        <div class="row mb-4">
            <div class="col-md-1">
                <a href="{{ route('employee.index') }}" type="button" class="btn btn-secondary" id="cancelButton">Cancel</a>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    @vite('resources/js/employee/edit.js')
@endpush

