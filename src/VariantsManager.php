<?php

namespace JGile\BladeComponents;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class VariantsManager
{
    protected array $cache = [];

    public function get($component, $variant = null, $default = null)
    {
        if ($variant === null) {
            $defaultVariant = config("blade-components.components.$component.default_variant");
            foreach (Arr::wrap($defaultVariant) as $var) {
                $variant[] = $var;
            }
        }

        return collect($variant)
            ->map(function ($variantString) use ($component) {
                return config($this->normalizeVariantKey($component, $variantString));
            })
            ->prepend(config("blade-components.components.$component.base"))
            ->join(' ');
    }


    protected function normalizeVariantKey(string $component, string $key)
    {
        return Str::of($key)->startsWith('blade-components.components') ? $key : "blade-components.components.$component.variants.$key";
    }
}
