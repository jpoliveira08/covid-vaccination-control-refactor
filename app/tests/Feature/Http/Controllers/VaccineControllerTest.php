<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use App\Livewire\Tables\VaccineTable;
use App\Models\Vaccine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class VaccineControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_render_index_view()
    {
        $this->get(route('vaccine.index'))
            ->assertStatus(200);
    }

    #[Test]
    public function it_should_renders_table_on_index_page()
    {
        $this->get(route('vaccine.index'))
            ->assertSeeLivewire(VaccineTable::class);
    }

    #[Test]
    public function it_creates_vaccine(): void
    {
        $this->withoutExceptionHandling();

        $this
            ->followingRedirects()
            ->post(route('vaccine.store'), [
                'name' => 'Pfizer',
                'batch' => '72O627H',
                'expiration_date' => '2027-11-06',
            ]);

        $vaccine = Vaccine::first();
        $this->assertEquals(1, Vaccine::count());
        $this->assertEquals('Pfizer', $vaccine->name);
        $this->assertEquals('72O627H', $vaccine->batch);
        $this->assertEquals('2027-11-06', $vaccine->expiration_date);
        $this->assertEquals(route('vaccine.index'), url()->current());
    }

    #[Test]
    public function it_shows_a_vaccine_data()
    {
        $vaccine = Vaccine::factory()->create();

        $this->get(route('vaccine.show', $vaccine))
            ->assertStatus(200);
    }

    #[Test]
    public function it_requires_all_fields_to_be_present(): void
    {
        $this
            ->post(route('vaccine.store'), [
                'name' => '',
                'batch' => '',
                'expiration_date' => '',
            ]);

        $this->assertEquals(0, Vaccine::count());
    }

    #[Test]
    public function it_deletes_vaccine()
    {
        $vaccine = Vaccine::factory()->create();

        $this->delete(route('vaccine.destroy', $vaccine));

        $this->assertEquals(0, Vaccine::count());
    }
}
