<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    /** @var string */
    public $action;

    /** @var string */
    public $method;

    /** @var bool */
    public $hasFiles;

    public function __construct(string $action, string $method = 'POST', bool $hasFiles = false)
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
    }
    
    public function render()
    {
        return view('blade-components::components.form');
    }
}