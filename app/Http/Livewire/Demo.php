<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Utilities\Color;

class Demo extends Component
{
    /**
     * @var int
     */
    public $count;

    /**
     * @var array
     */
    public $swatch = [];

    /**
     * Identify the query string parameters to be managed.
     *
     * @var array
     */
    protected $queryString = ['swatch'];

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->count = is_array($this->swatch) && !empty($this->swatch)
            ? count($this->swatch)
            : 5;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('demo.swatchr')
            ->layout('layouts.demo');
    }

    /**
     * Generate a new swatch.
     *
     * @return void
     */
    public function generateSwatch()
    {
        $this->swatch = [];
        foreach (range(1, $this->count) as $index) {
            $this->swatch[] = Color::random();
        }
    }

    /**
     * Increment the number of shades to include in the swatch.
     *
     * @return void
     */
    public function incrementCount()
    {
        $this->count++;

        if ($this->count > 6) {
            $this->count = 6;
        }
    }

    /**
     * Decrement the number of shades to include in the swatch.
     *
     * @return void
     */
    public function decrementCount()
    {
        $this->count--;

        if ($this->count < 1) {
            $this->count = 1;
        }
    }
}
