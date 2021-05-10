<?php

namespace JGile\BladeComponents;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

class AttributeBag extends ComponentAttributeBag
{
    protected Component $component;

    /**
     * AttributeBag constructor.
     * @param array $attributes
     * @param Variant $variantsManager
     */
    public function __construct(array $attributes = [], Component $component = null)
    {
        if ($component) {
            $this->component($component);
        }

        parent::__construct($attributes);
    }

    /**
     * Set the component.
     *
     * @param Component $component
     */
    public function component(Component $component)
    {
        $this->component = $component;

        return $this;
    }

    /**
     * Get variant attribute.
     *
     * @param string|null $key
     * @return Application|Component|Repository|mixed|string|null
     */
    public function variant(string $key = null)
    {
        if ($key) {
            return $this->component->get($key);
        }

        return $this->component;
    }

    /**
     * Injects variant classes into attributes.
     *
     * @param array $attributes
     */
    public function setAttributes(array $attributes)
    {
        parent::setAttributes($this->resolveVariantAttributes($attributes));
    }

    /**
     * @param $variants
     * @return $this
     */
    public function mergeVariant($variants)
    {
        $this->setAttributes(array_merge($currentVariants, ['variant' => $variants]));

        return $this;
    }

    /**
     * @param $condition
     * @param $variants
     * @return $this
     */
    public function mergeVariantIf($condition, $variants)
    {
        if ($condition) {
            $this->mergeVariant($variants);
        }

        return $this;
    }

    /**
     * @param array $attributes
     * @return array
     */
    public function resolveVariantAttributes(array $attributes)
    {
        $variantPrefix = config('blade-components.variant_prefix') . '-';

        foreach ($attributes as $key => $value) {
            if ($key === 'variant') {
                foreach (Arr::wrap($value) as $item) {
                    $this->component->variant((string)Str::of($item)->replace('-', '.'));
                }
            } elseif ($value && Str::of($key)->startsWith($variantPrefix)) {
                $this->component->variant((string)Str::of($key)->ltrim($variantPrefix)->replace('-', '.'));
            }
        }

        if (isset($attributes['class'])) {
            $this->component->mergeClasses($attributes['class']);
        }

        $attributes['class'] = $this->component->class();

        return $attributes;
    }
}
