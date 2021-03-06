<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use DateInterval;
use DateTimeInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;


class Countdown extends Component
{
    /** @var string */
    public $id;

    /** @var DateTimeInterface */
    public $expires;

    public function __construct(DateTimeInterface $expires)
    {
        $this->id = 'timer-'.Str::random(6);
        $this->expires = $expires;
    }

    public function render(): View
    {
        return view('blade-components::components.countdown');
    }

    public function days(): string
    {
        return sprintf('%02d', $this->difference()->d);
    }

    public function hours(): string
    {
        return sprintf('%02d', $this->difference()->h);
    }

    public function minutes(): string
    {
        return sprintf('%02d', $this->difference()->i);
    }

    public function seconds(): string
    {
        return sprintf('%02d', $this->difference()->s);
    }

    public function difference(): DateInterval
    {
        return $this->expires->diff(now());
    }
}
