<?php

namespace JGile\BladeComponents;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Variant
{
    protected string $variantKey;
    protected string $componentKey;
    protected string $configKey;
    protected Collection $classCollection;

    public function __construct(string $component = null, string $variant = null)
    {
        if ($component && $variant) {
            $this->load($component, $variant);
        }
    }

    /**
     * Load a component variant.
     *
     * @param string $component
     * @param string $variant
     */
    public function load(string $component, string $variant)
    {
        $this->componentKey = $component;
        $this->variantKey = $variant;
        $this->configKey = "blade-components.components.$component.variants.$variant";
    }

    /**
     * @param array|string $classes
     * @return $this
     */
    public function mergeClasses($classes)
    {
        $classes = is_array($classes) ? $classes : explode(' ', $classes);
        foreach ($classes as $value) {
            $this->classCollection->put($value, $value);
        }

        return $this;
    }

    /**
     * Get config file data.
     *
     * @param null $key
     * @param null $default
     * @return Repository|Application|mixed
     */
    public function get($key = null, $default = null)
    {
        return $key ? config("$this->configKey.$key", $default) : config($this->configKey, $default);
    }

    public function __toString()
    {

    }
}
