<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;

class Html extends Component
{
    public function render()
    {
        return view("blade-components::components.title");
    }
}