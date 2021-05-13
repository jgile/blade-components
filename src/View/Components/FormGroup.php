<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;

class FormGroup extends Component
{
    public $for;
    public $label;
    public $validate;
    public $description;

    public function __construct($for = null, $label = null, $validate = null, $description = null)
    {
        $this->for = $for;
        $this->label = $label;
        $this->description = $description;
        $this->validate = $validate === null ? $for : $validate;
    }

    public function render()
    {
        return view("blade-components::components.form-group");
    }
}