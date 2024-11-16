<?php

declare(strict_types=1);

namespace Tests\Feature\Services;

use App\Models\Vaccine;
use App\Services\VaccineService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class VaccineServiceTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_an_vaccine()
    {
        $vaccineData = [
            'name' => 'Pfizer',
            'batch' => '123AS23',
            'expiration_date' => '2027-05-05',
        ];

        $vaccineService = new VaccineService;
        $vaccineService->store($vaccineData);

        $this->assertEquals(1, Vaccine::count());
        $vaccine = Vaccine::first();
        $this->assertEquals($vaccineData['name'], $vaccine->name);
        $this->assertEquals($vaccineData['batch'], $vaccine->batch);
        $this->assertEquals($vaccineData['expiration_date'], $vaccine->expiration_date);
    }

    #[Test]
    public function it_can_update_an_vaccine()
    {
        $vaccine = Vaccine::factory()->create();
        $vaccineData = [
            'name' => 'Pfizer',
            'batch' => '123AS23',
            'expiration_date' => '2027-05-05',
        ];

        $vaccineService = new VaccineService;
        $vaccineService->update($vaccineData, $vaccine);

        $this->assertEquals(1, Vaccine::count());
        $vaccine = Vaccine::first();
        $this->assertEquals($vaccineData['name'], $vaccine->name);
        $this->assertEquals($vaccineData['batch'], $vaccine->batch);
        $this->assertEquals($vaccineData['expiration_date'], $vaccine->expiration_date);
    }

    #[Test]
    public function it_can_delete_an_vaccine()
    {
        $vaccine = Vaccine::factory()->create();
        $this->assertEquals(1, Vaccine::count());

        $vaccineService = new VaccineService;
        $vaccineService->destroy($vaccine);

        $this->assertEquals(0, Vaccine::count());
    }
}
