<?php

namespace JGile\BladeComponents\Traits;

use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;
use JGile\BladeComponents\AttributeBag;
use JGile\BladeComponents\Component;
use JGile\BladeComponents\Variant;

trait HasVariants
{
    /**
     * Get a new attribute bag instance.
     *
     * @param array $attributes
     * @return ComponentAttributeBag
     */
    protected function newAttributeBag(array $attributes = [])
    {
        return new AttributeBag($attributes, new Component($this->getComponentKey()));
    }

    protected function getComponentKey()
    {
        if (property_exists($this, 'variantKey')) {
            return $this->variantKey;
        }

        return (string)Str::of(get_class($this))->afterLast('\\')->kebab()->lower();
    }
}