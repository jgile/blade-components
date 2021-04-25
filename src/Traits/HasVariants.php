<?php

namespace JGile\BladeComponents\Traits;

use ArrayAccess;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;
use JGile\BladeComponents\AttributeBag;

trait HasVariants
{
    public ?array $loadedVariants = null;

    /**
     * Define component variants here.  Alternative to config file.
     *
     * @return array
     */
    protected function variants(): array
    {
        return [];
    }

    /**
     * Get a new attribute bag instance.
     *
     * @param array $attributes
     * @return ComponentAttributeBag
     */
    protected function newAttributeBag(array $attributes = [])
    {
        return new AttributeBag($attributes, $this->getVariantBase(), $this->getVariants(), $this->getDefaultVariant());
    }

    /**
     * Get the config key for current component.
     */
    protected function getVariantConfigKey()
    {
        if (property_exists($this, 'configKey')) {
            return $this->configKey;
        }

        return (string)Str::of(get_class($this))->afterLast('\\')->lower()->prepend("blade-components.components.");
    }

    /**
     * Get config file data.
     *
     * @param null $key
     * @param null $default
     * @return Repository|Application|mixed
     */
    protected function variantConfig($key = null, $default = null)
    {
        $configKey = $this->getVariantConfigKey();

        return $key ? config("$configKey.$key", $default) : config($configKey, $default);
    }

    /**
     * Get the selected or default variant name
     *
     * @return Repository|Application|mixed
     */
    protected function getDefaultVariant()
    {
        if (property_exists($this, 'defaultVariant')) {
            return $this->defaultVariant;
        }

        return $this->variantConfig('default_variant', 'default');
    }

    /**
     * Get base classes for component variants.
     *
     * @return string
     */
    protected function getVariantBase(): string
    {
        if (property_exists($this, 'variantBase') && is_string($this->variantBase)) {
            return $this->variantBase;
        }

        return $this->variantConfig('base', '');
    }

    /**
     * Get array of all variants.
     *
     * @return array|ArrayAccess|null
     */
    protected function getVariants()
    {
        if ($this->loadedVariants === null) {
            // Load any class defined variants.
            $this->loadedVariants = $this->variants();

            // Load variants in config file
            $this->loadedVariants = array_merge($this->loadedVariants, $this->variantConfig('variants', []));

            // Load any variants defined in class property
            if (property_exists($this, 'variants') && is_array($this->variants)) {
                $this->loadedVariants = array_merge($this->loadedVariants, $this->variants);
            }
        }

        return $this->loadedVariants;
    }
}