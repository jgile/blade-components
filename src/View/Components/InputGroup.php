<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public $for;
    public $label;
    public $validate;
    public $description;

    public function __construct($for = null, $label = null, $validate = null, $description = null)
    {
        $this->for = $for;
        $this->validate = $validate === null ? $for : $validate;
        $this->label = $label;
        $this->description = $description;
    }

    public function render()
    {
        return view("blade-components::components.input-group");
    }
}