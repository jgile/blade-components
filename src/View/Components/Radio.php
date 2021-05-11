<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;

class Radio extends Component
{
    public string $id;
    public ?string $value;
    public ?string $name;

    public function __construct(string $id = null, string $value = null, string $name = null)
    {
        $this->value = $value;
        $this->name = $name;
        $this->id = $id ?? md5('radio' . $value . $name);
    }

    public function render()
    {
        return view("blade-components::components.radio");
    }
}