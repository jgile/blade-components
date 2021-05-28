<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class ValidationErrors extends Component
{
    public function render()
    {
        return view("blade-components::components.validation-errors");
    }
}