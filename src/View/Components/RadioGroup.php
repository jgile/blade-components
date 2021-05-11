<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var string */
    public $type;

    /** @var string */
    public $value;

    /** @var array */
    public $options;

    /** @var bool */
    public $allow_empty;

    public function __construct(string $name, string $id = null, string $value = '', $options = null, bool $allowEmpty = false)
    {
        $this->options = $this->resolveOptions($options);
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value);
        $this->allow_empty = $allowEmpty;
    }

    /**
     * @param $options
     * @return array
     */
    protected function resolveOptions($options)
    {
        if(is_array($options)) {
            return $options;
        }

        // Attempt to find the name attribute
        if(is_a($options, Collection::class)) {
            $nameAttribute = Arr::get($options->first(), 'name', Arr::get($options->first(), 'title', Arr::get($options->first(), 'label')));
            $idAttribute = Arr::get($options->first(), 'id', Arr::get($options->first(), 'uuid'));

            if($nameAttribute && $idAttribute) {
                return $options->keyBy($idAttribute)->pluck($nameAttribute)->toArray();
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view("blade-components::components.radio-group");
    }
}
