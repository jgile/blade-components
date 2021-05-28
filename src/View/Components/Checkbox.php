<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class Checkbox extends Component
{
    public string $id;
    public ?string $name;
    public ?string $value;

    public function __construct(string $id = null, string $name = null, string $value = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->id = $id ?? md5('checkbox' . $name . $value);

    }

    public function render()
    {
        return view("blade-components::components.checkbox");
    }
}