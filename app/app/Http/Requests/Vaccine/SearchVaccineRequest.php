<?php

declare(strict_types=1);

namespace App\Http\Requests\Vaccine;

use Illuminate\Foundation\Http\FormRequest;

class SearchVaccineRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
