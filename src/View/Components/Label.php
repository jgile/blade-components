<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class Label extends Component
{
    use HasVariants;

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

    public function render()
    {
        return view("blade-components::components.label");
    }
}