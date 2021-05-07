<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Select2 extends Component
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

    /** @var mixed|string */
    public $placeholder;

    /** @var bool */
    public $allow_empty;

    public function __construct(string $name, string $id = null, string $value = null, $options = null, string $placeholder = null, bool $allowEmpty = false)
    {
        $this->placeholder = $placeholder;
        $this->options = $this->resolveOptions($options);
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->allow_empty = $allowEmpty;
        $this->value = old($name, $value);
    }

    protected function resolveOptions($options)
    {
        if (is_array($options)) {

            $isAssoc = Arr::isAssoc($options);
            if ($isAssoc) {
                return collect($options)->map(function ($label, $value) {
                    return ['value' => $value, 'label' => $label];
                })->sortBy('label')->values()->toArray();
            }

            if (!$isAssoc && !is_array($options[0])) {
                return collect($options)->map(function ($value) {
                    return ['value' => $value, 'label' => $value];
                })->sortBy('label')->values()->toArray();
            }

            return $options;
        }

        // Attempt to find the name attribute
        if (is_a($options, Collection::class)) {
            return $options
                ->map(function ($model) {
                    return [
                        'value' => Arr::get($model, 'id', Arr::get($model, 'uuid')),
                        'label' => Arr::get($model, 'name', Arr::get($model, 'title', Arr::get($model, 'label'))),
                    ];
                })
                ->sortBy('label')
                ->values()
                ->toArray();
        }

    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view("blade-components::components.select2");
    }
}
