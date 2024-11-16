@extends('layout.layout')

@section('title')
    Create Employee
@endsection
@section('content')
    @section('page_title')
        Create Employee
    @endsection

<form action="{{ route('employee.store') }}" method="POST">
    @csrf
    @method('POST')
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="employee-name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="employee-name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="employee-cpf" name="cpf"  value="{{ old('cpf') }}" required>
            @error('cpf')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="birth-date" class="form-label">Birth date</label>
            <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth-date" name="birth_date" value="{{ old('birth_date') }}" required>
            @error('birth_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-4 ms-1">
        <div class="form-check">
            <input type="checkbox" class="form-check-input @error('has_comorbidity') is-invalid @enderror" id="has-comorbidity" name="has_comorbidity @checked(old('has_comorbidity'))">
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
        @forelse (old('vaccines', []) as $i => $vaccine)
            <div class="row mb-4 vaccine-repeater-item">
                <div class="col-md-6">
                    <label class="form-label d-block">Vaccine description</label>
                    <div class="vaccineSelect"></div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Dose date</label>
                    <input type="date" class="form-control" name="vaccines[{{$i}}][dose_date]" @isset($vaccine['dose_date']) value="{{$vaccine['dose_date']}}" @endisset">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Dose number</label>
                    <input type="number" class="form-control" name="vaccines[{{$i}}][dose_number]" @isset($vaccine['dose_number']) value="{{$vaccine['dose_number']}}" @endisset>
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
        @empty
            <div class="row mb-4 vaccine-repeater-item">
                <div class="col-md-6">
                    <label class="form-label d-block">Vaccine description</label>
                    <div class="vaccineSelect"></div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Dose date</label>
                    <input type="date" class="form-control" name="vaccines[0][dose_date]">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Dose number</label>
                    <input type="number" class="form-control" name="vaccines[0][dose_number]">
                </div>
                <div class="col-md-1">
                    <label class="form-label"></label>
                    <button type="button" class="btn btn-primary form-control mt-2 add-vaccine">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
        @endforelse
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
    @vite('resources/js/employee/index.js')
@endpush

