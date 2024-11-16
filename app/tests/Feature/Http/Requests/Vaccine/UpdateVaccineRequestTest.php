<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Requests\Vaccine;

use App\Http\Requests\Vaccine\UpdateVaccineRequest;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UpdateVaccineRequestTest extends TestCase
{
    #[Test]
    public function it_has_the_correct_rules(): void
    {
        $request = new UpdateVaccineRequest;

        $rules = [
            'name' => ['required', 'string'],
            'batch' => ['required', 'string'],
            'expiration_date' => ['required', 'date'],
        ];

        $this->assertEquals($rules, $request->rules());
    }

    #[Test]
    public function it_authorizes_every_request(): void
    {
        $request = new UpdateVaccineRequest;

        $this->assertTrue($request->authorize());
    }
}
