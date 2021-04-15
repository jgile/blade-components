<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Label extends Component
{
    public $for;
    public $value;

    /**
     * Create a new component instance.
     *
     * @param string $for
     * @param string|null $value
     */
    public function __construct(string $for = '', string $value = null)
    {
        $this->for = $for;
        $this->value = $value;
    }

    public function fallback(): string
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }

    public function render()
    {
        return view("blade-components::components.label");
    }
}