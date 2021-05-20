<?php

namespace JGile\BladeComponents;

use Illuminate\Support\Arr;

class Component
{
    protected string $componentKey;
    protected string $configKey;
    protected array $variants = [];
    protected $classes = [];

    /**
     * Variant constructor.
     *
     * @param string|null $component
     * @param string|null $variant
     */
    public function __construct(string $component = null, $variant = [])
    {
        $this->load($component);
        $this->variant($variant);
    }

    /**
     * @param string|null $component
     * @param array|string $variant
     * @return static
     */
    public static function make(string $component = null, $variant = [])
    {
        return new static($component, $variant);
    }

    /**
     * Load a component variant.
     *
     * @param string $component
     * @param string|array $variant
     */
    public function load(string $component, $variant = null)
    {
        $this->componentKey = $component;
        $this->configKey = "blade-components.components.$component";

        if ($variant !== null) {
            $this->variant($variant);
        }
    }

    /**
     * Use a variant.
     *
     * @param array|string $variants
     */
    public function variant($variants)
    {
        foreach (Arr::wrap($variants) as $variant) {
            $this->variants[$variant] = $variant;
        }

        return $this;
    }

    /**
     * Get config file data.
     *
     * @param null $key
     * @param null $default
     * @return string|null
     */
    public function get($key, $default = null)
    {
        $attr = '';
        foreach ($this->variants as $variant) {
            $loaded = config("$this->configKey.variants.$variant.$key");
            $attr .= ' ' . $loaded;
        }

        return $attr ?: $default;
    }

    /**
     * Merge classes.
     *
     * @param $classes
     * @return $this
     */
    public function mergeClasses($classes)
    {
        $classes = is_array($classes) ? $classes : explode(' ', $classes);
        foreach ($classes as $class) {
            $this->classes[$class] = $class;
        }

        return $this;
    }

    /**
     * Get component class.
     * @return string
     */
    public function class()
    {
        $classes = explode(" ", config("$this->configKey.base"));
        $classes = array_combine($classes, $classes);

        // Get default variant
        if (empty($this->variants)) {
            if (config()->has("$this->configKey.default_variant")) {
                foreach (Arr::wrap(config("$this->configKey.default_variant")) as $var) {
                    $this->variants[$var] = $var;
                }
            } elseif (config()->has("$this->configKey.variants.default")) {
                $this->variants['default'] = 'default';
            }
        }

        // Resolve classes from variants
        foreach ($this->variants as $variant) {
            $loaded = config("$this->configKey.variants.$variant");
            if (is_string($loaded)) {
                $loaded = explode(" ", isset($loaded['class']) ? $loaded['class'] : $loaded);
                foreach ($loaded as $val) {
                    $classes[$val] = $val;
                }
            }
        }

        foreach ($this->classes as $class) {
            $classes[$class] = $class;
        }

        return implode(" ", $classes);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->class();
    }
}
