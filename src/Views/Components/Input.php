<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class Input extends Component
{
    use HasVariants;

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return view("blade-components::components.input");
    }
}

