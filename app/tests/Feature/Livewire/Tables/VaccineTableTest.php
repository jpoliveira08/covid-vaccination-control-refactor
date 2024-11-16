<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire\Tables;

use App\Livewire\Tables\VaccineTable;
use App\Models\Vaccine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class VaccineTableTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_should_render_successfully()
    {
        Livewire::test(VaccineTable::class)
            ->assertStatus(200);
    }

    #[Test]
    public function it_shows_the_view_button_when_records_exist()
    {
        Vaccine::factory()->create();
        $this->assertEquals(1, Vaccine::count());

        Livewire::test(VaccineTable::class)
            ->assertHasAction('show');
    }

    #[Test]
    public function it_does_not_show_view_button_when_no_records_exist()
    {
        $this->assertEquals(0, Vaccine::count());

        Livewire::test(VaccineTable::class)
            ->assertHasAction('show');
    }

    #[Test]
    public function it_shows_the_delete_button_when_records_exist()
    {
        Vaccine::factory()->create();
        $this->assertEquals(1, Vaccine::count());

        Livewire::test(VaccineTable::class)
            ->assertHasAction('delete');
    }
}
