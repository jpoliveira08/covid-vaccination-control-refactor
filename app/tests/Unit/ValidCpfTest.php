<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Rules\ValidCpf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ValidCpfTest extends TestCase
{
    #[Test]
    public function rule_passes_with_cpf_with_11_digits_with_and_without_special_characters()
    {
        (new ValidCpf)->validate(
            attribute: 'cpf',
            value: '123.456.789-09',
            fail: fn () => $this->fail('The rule should pass.')
        );
        (new ValidCpf)->validate(
            attribute: 'cpf',
            value: '98765432100',
            fail: fn () => $this->fail('The rule should pass.')
        );

        $this->assertTrue(true);
    }

    #[Test]
    public function rule_fails_cpf_with_less_than_11_digits()
    {
        (new ValidCpf)->validate(
            attribute: 'cpf',
            value: '123.456.78',
            fail: fn () => $this->assertTrue(true)
        );
    }

    #[Test]
    public function rule_fails_cpf_with_more_than_11_digits()
    {
        (new ValidCpf)->validate(
            attribute: 'cpf',
            value: '123.456.789-092',
            fail: fn () => $this->assertTrue(true)
        );
    }

    #[Test]
    public function rule_fails_cpf_with_all_identical_digits()
    {
        (new ValidCpf)->validate(
            attribute: 'cpf',
            value: '111.111.111-11',
            fail: fn () => $this->assertTrue(true)
        );
    }

    #[Test]
    public function rule_fails_cpf_with_invalid_first_check_digit()
    {
        (new ValidCpf)->validate(
            attribute: 'cpf',
            value: '123.456.789-08',
            fail: fn () => $this->assertTrue(true)
        );
    }

    #[Test]
    public function rule_fails_cpf_with_invalid_second_check_digit()
    {
        (new ValidCpf)->validate(
            attribute: 'cpf',
            value: '123.456.789-00',
            fail: fn () => $this->assertTrue(true)
        );
    }

    #[Test]
    public function rule_fails_cpf_with_unexpected_characters()
    {
        (new ValidCpf)->validate(
            attribute: 'cpf',
            value: 'ABC.DEF.GHI-JK',
            fail: fn () => $this->assertTrue(true)
        );
        (new ValidCpf)->validate(
            attribute: 'cpf',
            value: '123.456.789-0@',
            fail: fn () => $this->assertTrue(true)
        );
    }

    #[Test]
    public function it_returns_the_proper_error_message()
    {
        (new ValidCpf)->validate(
            attribute: 'cpf',
            value: '12345678911',
            fail: fn ($message) => $this->assertEquals(
                $message,
                'The :attribute must be a valid CPF.'
            )
        );
    }
}
