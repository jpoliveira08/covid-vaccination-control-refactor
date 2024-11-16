<?php

declare(strict_types=1);

namespace App\Http\Requests\Vaccine;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreVaccineRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'batch' => ['required', 'string'],
            'expiration_date' => ['required', 'date'],
        ];
    }

    protected function failedValidation(Validator $validator): HttpResponseException
    {
        throw new HttpResponseException(
            response()->json($validator->errors(), 422)
        );
    }
}
