<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;

class ValidationError extends Component
{
    public string $for;

    public function __construct($for)
    {
        $this->for = $for;
    }

    public function render()
    {
        return view("blade-components::components.validation-error");
    }
}