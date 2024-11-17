<form {{ $attributes }} method="POST">
    @csrf
    {{ $method }}
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="employee-name" class="form-label">Name</label>
            {{ $inputEmployeeName }}
        </div>
        <div class="col-md-2">
            <label for="cpf" class="form-label">CPF</label>
            {{ $inputEmployeeCpf }}
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="birth-date" class="form-label">Birth date</label>
            {{ $inputEmployeeBirthDate }}
        </div>
    </div>
    <div class="row mb-4 ms-1">
        <div class="form-check">
            <label class="form-check-label" for="has_comorbidity">Has comorbidity</label>
            {{ $inputEmployeeHasComorbidity }}
        </div>
    </div>
    <hr>
    <h2>Vaccines</h2>
    @error('vaccines')
        <div class="alert alert-danger">
            Please check the vaccination details entered and try again.
        </div>
    @enderror
    {{ $vaccineContainer }}
    <div class="row mb-4">
        <div class="col-md-1">
            <a href="{{ route('employee.index') }}" type="button" class="btn btn-secondary" id="cancelButton">Cancel</a>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
</form>
