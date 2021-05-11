<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;

class Quill extends Component
{
    public $theme;
    public $value;
    public $placeholder;
    public $modules;

    public function __construct($value = '', string $placeholder = '', string $theme = 'snow', array $modules = null)
    {
        $this->value = $value;
        $this->theme = $theme;
        $this->placeholder = $placeholder;
        $this->modules = $modules ?? ['toolbar' => [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote'],
                [['list' => 'ordered'], ['list' => 'bullet']],
            ]];
    }

    public function render()
    {
        return view("blade-components::components.quill");
    }
}