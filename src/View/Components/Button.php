<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class Button extends Component
{
    use HasVariants;

    public bool $loading = false;

    public function __construct(bool $loading = false)
    {
        $this->loading = $loading;
    }

    public function render()
    {
        return view("blade-components::components.button");
    }
}
