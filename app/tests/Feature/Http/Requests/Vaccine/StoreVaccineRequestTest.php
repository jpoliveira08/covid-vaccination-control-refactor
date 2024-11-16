<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Requests\Vaccine;

use App\Http\Requests\Vaccine\StoreVaccineRequest;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreVaccineRequestTest extends TestCase
{
    #[Test]
    public function it_has_the_correct_rules(): void
    {
        $request = new StoreVaccineRequest;

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
        $request = new StoreVaccineRequest;

        $this->assertTrue($request->authorize());
    }
}
