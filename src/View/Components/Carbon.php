<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use DateTimeInterface;
use Illuminate\Contracts\View\View;
use Carbon\Carbon as CarbonAlias;
use Carbon\CarbonInterface;

class Carbon extends Component
{
    /** @var CarbonInterface */
    public $date;

    /** @var string */
    public $format;

    /** @var bool */
    public $human;

    /** @var string|null */
    public $local;

    protected static $assets = ['moment'];

    public function __construct(
        DateTimeInterface $date,
        string $format = 'Y-m-d H:i:s',
        bool $human = false,
        $local = null
    )
    {
        $this->date = CarbonAlias::instance($date);
        $this->format = $format;
        $this->human = $human;
        $this->local = $local;
    }

    public function render(): View
    {
        return view('blade-components::components.carbon');
    }
}
