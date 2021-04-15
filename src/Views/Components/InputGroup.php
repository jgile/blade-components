<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public $label;
    public $validate;
    public $for;

    public function __construct($label = null, $validate = null, $for = null)
    {
        $this->label = $label;
        $this->validate = $validate;
        $this->for = $for;
    }

    public function render()
    {
        return view("blade-components::components.input-group");
    }
}