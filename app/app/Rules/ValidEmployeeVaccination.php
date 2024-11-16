<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidEmployeeVaccination implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_array($value) || empty($value)) {
            $fail('The :attribute must be an valid array.');

            return;
        }

        foreach ($value as $arrayValue) {
            $countValues = 3;

            foreach ($arrayValue as $inputKey => $inputValue) {
                if ($inputValue === null) {
                    $countValues--;
                }
            }

            if ($countValues < 3 && $countValues > 0) {
                $fail('The :attribute must be an valid array.');

                return;
            }
        }
    }
}
