<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;

class StackItem extends Component
{
    public string $classes = '';

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
        $this->classes = 'flex';
        $this->appendIf($end, 'self-end');
        $this->appendIf($start, 'self-start');
        $this->appendIf($stretch, 'self-stretch');
        $this->appendIf($center, 'self-center');
        $this->appendIf($grow, 'flex-grow');
        $this->appendIf($shrink, 'flex-shrink');
        $this->appendIf($first, 'order-first');
        $this->appendIf($last, 'order-last');
        $this->appendIf($nth, "order-$nth");
    }

    public function appendIf($condition, $class, $default = null)
    {
        if ($condition) {
            $this->classes .= " $class";
        } elseif ($default) {
            $this->classes .= " $default";
        }
    }

    public function render()
    {
        return view("blade-components::components.stack-item");
    }
}