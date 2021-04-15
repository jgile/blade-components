<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;
use JGile\BladeComponents\ClassCollection;

class StackItem extends Component
{
    public ClassCollection $classCollection;

    public function __construct(
        bool $end = false,
        bool $grow = false,
        bool $shrink = false,
        bool $center = false,
        bool $stretch = false,
        bool $start = false,
        bool $first = false,
        bool $last = false,
        int $nth = null
    )
    {
        $this->classCollection = new ClassCollection(['flex']);
        $this->classCollection->pushIf($end, 'self-end');
        $this->classCollection->pushIf($start, 'self-start');
        $this->classCollection->pushIf($stretch, 'self-stretch');
        $this->classCollection->pushIf($center, 'self-center');
        $this->classCollection->pushIf($grow, 'flex-grow');
        $this->classCollection->pushIf($shrink, 'flex-shrink');
        $this->classCollection->pushIf($first, 'order-first');
        $this->classCollection->pushIf($last, 'order-last');
        $this->classCollection->pushIf($nth, "order-$nth");
    }

    public function render()
    {
        return view("blade-components::components.stack-item");
    }
}