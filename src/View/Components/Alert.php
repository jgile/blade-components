<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class Alert extends Component
{
    public string $icon = '';
    public string $title = '';
    public array $list = [];

    public function __construct(string $title = '', string $icon = '', array $list = [])
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->list = $list;
    }

    public function render()
    {
        return view("blade-components::components.alert");
    }
}
