<?php

declare(strict_types=1);

if (! function_exists('clean_cpf')) {
    function clean_cpf($cpf): string
    {
        return preg_replace('/\D/', '', $cpf);
    }
}

if (! function_exists('formatCpf')) {
    function formatCpf($cpf): string
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", '$1.$2.$3-$4', $cpf);
    }
}
