<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;

class Toggle extends Component
{
    public function render()
    {
        return view("blade-components::components.toggle");
    }
}