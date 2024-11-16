<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCpf implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     *
     * @see https://github.com/LaravelLegends/pt-br-validator/blob/master/src/pt-br-validator/Rules/Cpf.php
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $message = 'The :attribute must be a valid CPF.';
        $c = clean_cpf($value);

        if (strlen($c) != 11 || preg_match("/^{$c[0]}{11}$/", $c)) {
            $fail($message);

            return;
        }

        for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);
        if ($c[9] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            $fail($message);

            return;
        }

        for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);
        if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            $fail($message);
        }
    }
}
