<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
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
