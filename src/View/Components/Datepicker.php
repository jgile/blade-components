<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class Datepicker extends Component
{
    use HasVariants;

    protected $variantKey = 'input';

    public string $config;
    public string $name;

    public function __construct(string $name, string $config = '{}')
    {
        $this->name = $name;
        $this->config = $config;
    }

    public function render()
    {
        return view("blade-components::components.datepicker");
    }
}