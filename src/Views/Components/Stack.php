<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\ClassCollection;

class Stack extends Component
{
    public ClassCollection $classCollection;

    public function __construct(
        bool $vertical = false,
        bool $reverse = false,
        bool $center = false,
        bool $stretch = false,
        bool $start = false,
        bool $end = false,
        bool $between = false,
        bool $even = false,
        bool $around = false,
        bool $grow = false,
        bool $shrink = false,
        $space = null
    )
    {
        $this->classCollection = new ClassCollection(['flex']);

        if ($vertical) {
            $this->classCollection->pushIf($reverse, 'flex-col-reverse', 'flex-col');
            $this->classCollection->pushIf($space, $space === true ? "space-y-2" : "space-y-$space");
        } else {
            $this->classCollection->pushIf($reverse, 'flex-row-reverse', 'flex-row');
            $this->classCollection->pushIf($space, $space === true ? "space-x-2" : "space-x-$space");
        }

        $this->classCollection->pushIf($end, 'items-end');
        $this->classCollection->pushIf($start, 'items-start');
        $this->classCollection->pushIf($stretch, 'items-stretch');
        $this->classCollection->pushIf($center, 'items-center');
        $this->classCollection->pushIf($even, 'justify-evenly');
        $this->classCollection->pushIf($between, 'justify-between');
        $this->classCollection->pushIf($around, 'justify-around');
        $this->classCollection->pushIf($grow, 'flex-grow');
        $this->classCollection->pushIf($shrink, 'flex-shrink');
    }


    public function render()
    {
        return view("blade-components::components.stack");
    }
}