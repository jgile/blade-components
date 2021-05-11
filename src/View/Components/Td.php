<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;

class Td extends Component
{
    public function render()
    {
        return view("blade-components::components.table-cell");
    }
}