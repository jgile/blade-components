<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;

class Stack extends Component
{
    public string $classes;

    public function __construct(
        bool $vertical = false,
        bool $reverse = false,
        bool $center = false,
        bool $stretch = false,
        bool $between = false,
        bool $even = false,
        bool $around = false,
        bool $grow = false,
        bool $shrink = false,
        bool $right = false,
        bool $left = false,
        bool $top = false,
        bool $bottom = false,
        bool $end = false,
        bool $start = false,
        bool $wrap = false,
        $space = null
    )
    {
        $this->classes = 'flex';

        if ($vertical) {
            $this->appendIf($reverse, 'flex-col-reverse', 'flex-col');
            $this->appendIf($space, $space === true ? "space-y-2" : "space-y-$space");
            $this->appendIf($right, 'items-end');
            $this->appendIf($left, 'items-start');
            $this->appendIf($bottom, 'justify-end');
            $this->appendIf($top, 'justify-start');
        } else {
            $this->appendIf($reverse, 'flex-row-reverse');
            $this->appendIf($space, $space === true ? "space-x-2" : "space-x-$space");
            $this->appendIf($right, 'justify-end');
            $this->appendIf($left, 'justify-start');
            $this->appendIf($top, 'content-start');
            $this->appendIf($bottom, 'content-end');
        }

        $this->appendIf($wrap, 'flex-wrap');
        $this->appendIf($end, 'items-end');
        $this->appendIf($start, 'items-start');
        $this->appendIf($stretch, 'items-stretch');
        $this->appendIf($center, 'items-center');
        $this->appendIf($even, 'justify-evenly');
        $this->appendIf($between, 'justify-between');
        $this->appendIf($around, 'justify-around');
        $this->appendIf($grow, 'flex-grow');
        $this->appendIf($shrink, 'flex-shrink');
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
        return view("blade-components::components.stack");
    }
}