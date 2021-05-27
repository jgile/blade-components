<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Select2 extends Component
{
    /** @var array */
    public $options;

    public function __construct($options = null)
    {
        $this->options = $this->resolveOptions($options);
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

    public function render()
    {
        return view("blade-components::components.select2");
    }
}
