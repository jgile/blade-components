<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class Tab extends Component
{
    public bool $active;

    public function __construct(bool $active = false)
    {
        $this->active = $active;
    }

    public function render()
    {
        return view('blade-components::components.tab');
    }
}