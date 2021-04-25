<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public $for;
    public $label;
    public $validate;

    public function __construct($for = null, $label = null, $validate = null)
    {
        $this->for = $for;
        $this->validate = $validate === null ? $for : $validate;
        $this->label = $label;
    }

    public function render()
    {
        return view("blade-components::components.input-group");
    }
}