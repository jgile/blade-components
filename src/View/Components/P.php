<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class P extends Component
{
    use HasVariants;

    public function render()
    {
        return view("blade-components::components.p");
    }
}
