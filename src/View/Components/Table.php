<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $headers;

    public function __construct(array $headers = null)
    {
        $this->headers = $headers;
    }

    public function render()
    {
        return view("blade-components::components.table");
    }
}