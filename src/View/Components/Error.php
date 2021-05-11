<?php

namespace JGile\BladeComponents\View\Components;

use JGile\BladeComponents\Traits\HasVariants;
use Illuminate\View\Component;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\View;

class Error extends Component
{
    use HasVariants;

    /** @var string */
    public $for;

    /** @var string */
    public $bag;

    /** @var bool */
    public $show = false;

    public function __construct(string $for, string $bag = 'default', bool $show = false)
    {
        $this->for = $for;
        $this->show = $show;
        $this->bag = $bag;
    }

    public function messages(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }

    public function render()
    {
        return view("blade-components::components.error");
    }
}