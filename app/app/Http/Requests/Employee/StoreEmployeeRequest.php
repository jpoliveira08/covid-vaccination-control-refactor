<?php

declare(strict_types=1);

namespace App\Http\Requests\Employee;

use App\Rules\ValidCpf;
use App\Rules\ValidEmployeeVaccination;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'cpf' => ['required', 'string', new ValidCpf, 'unique:employees,cpf'],
            'birth_date' => ['required', 'date'],
            'has_comorbidity' => ['nullable', 'boolean'],
            'vaccines' => ['nullable', new ValidEmployeeVaccination],
        ];
    }
}
