<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class Banner extends Component
{
    use HasVariants;

    public bool $show = true;

    public function __construct($show = true)
    {
        $this->show = $show;
    }

    public function render()
    {
        return view('blade-components::components.banner');
    }
}