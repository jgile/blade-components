<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class InputError extends Component
{
    use HasVariants;

    public string $for;

    public function __construct($for)
    {
        $this->for = $for;
    }

    public function render()
    {
        return view("blade-components::components.input-error");
    }
}