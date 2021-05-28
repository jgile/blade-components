<?php

namespace JGile\BladeComponents\View\Components;

use JGile\BladeComponents\Traits\HasVariants;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Error extends Component
{
    /** @var string */
    public $for;

    /** @var string */
    public $bag;

    /** @var bool */
    public $show = false;

    public function __construct(string $for, string $bag = 'default', bool $show = false)
    {
        $this->for = $for;
        $this->bag = $bag;
        $this->show = $show;
    }

    public function messages(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->for) ? $bag->get($this->for) : [];
    }

    public function render()
    {
        return view("blade-components::components.error");
    }
}