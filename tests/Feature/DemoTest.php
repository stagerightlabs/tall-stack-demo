<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Demo as LivewireDemo;

class DemoTest extends TestCase
{
    /** @test */
    public function it_accepts_swatches_via_query_string()
    {
        Livewire::withQueryParams(['swatch' => ['#abcdefg']])
            ->test(LivewireDemo::class)
            ->assertSet('swatch', ['#abcdefg'])
            ->assertSet('count', 1)
            ->assertSee('#abcdefg');
    }

    /** @test */
    public function it_generates_swatches()
    {
        Livewire::test(LivewireDemo::class)
            ->assertSet('swatch', [])
            ->assertSet('count', 5)
            ->call('generateSwatch')
            ->assertCount('swatch', 5);
    }

    /** @test */
    public function it_increments_the_count()
    {
        Livewire::test(LivewireDemo::class)
            ->set('count', 5)
            ->call('incrementCount')
            ->assertSet('count', 6);
    }

    /** @test */
    public function it_doesnt_increment_the_count_higher_than_six()
    {
        Livewire::test(LivewireDemo::class)
            ->set('count', 6)
            ->call('incrementCount')
            ->assertSet('count', 6);
    }

    /** @test */
    public function it_decrements_the_count()
    {
        Livewire::test(LivewireDemo::class)
            ->set('count', 5)
            ->call('decrementCount')
            ->assertSet('count', 4);
    }

    /** @test */
    public function it_doesnt_decrement_the_count_below_one()
    {
        Livewire::test(LivewireDemo::class)
            ->set('count', 1)
            ->call('decrementCount')
            ->assertSet('count', 1);
    }
}
