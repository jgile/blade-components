<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;

class ValidationErrors extends Component
{
    public function render()
    {
        return view("blade-components::components.validation-errors");
    }
}