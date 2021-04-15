<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $maxWidth;

    public function __construct($maxWidth = null)
    {
        $this->maxWidth = $maxWidth;
    }

    public function render()
    {
        return view("blade-components::components.modal");
    }
}