<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\Traits\HasVariants;

class Card extends Component
{
    use HasVariants;

    public $title;
    public $flush;

    public function __construct($title = null, $flush = false)
    {
        $this->title = $title;
        $this->flush = $flush;
    }

    public function render()
    {
        return view("blade-components::components.card");
    }
}
