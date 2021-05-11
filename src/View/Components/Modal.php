<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $maxWidth;
    public bool $center = false;

    public function __construct($maxWidth = null, $center = false)
    {
        $this->center = $center;
        $this->maxWidth = $maxWidth;
    }

    public function render()
    {
        return view("blade-components::components.modal");
    }
}
