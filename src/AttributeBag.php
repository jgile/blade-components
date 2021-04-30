<?php

namespace JGile\BladeComponents;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

class AttributeBag extends ComponentAttributeBag
{
    protected $defaultVariant = null;
    protected $baseVariant = '';
    protected $variants = [];

    public function __construct(array $attributes = [], string $baseVariant = '', array $variants = [], $defaultVariant = null)
    {
        parent::__construct($attributes);
        $this->baseVariant = $baseVariant;
        $this->variants = $variants;
        $this->defaultVariant = $defaultVariant;
    }

    public function setAttributes(array $attributes)
    {
        parent::setAttributes($this->resolveVariantAttributes($attributes));
    }

    public function merge(array $attributeDefaults = [], $escape = true)
    {
        if (isset($attributeDefaults['class'], $this->attributes['class'])) {
            $this->attributes['class'] = (string)ClassCollection::make()
                ->addClasses($attributeDefaults['class'])
                ->addClasses($this->attributes['class']);

            unset($attributeDefaults['class']);
        }

        return parent::merge($attributeDefaults, $escape);
    }

    public function mergeVariantIf($condition, $variants)
    {
        if ($condition) {
            $this->mergeVariant($variants);
        }

        return $this;
    }

    public function mergeVariant($variants)
    {
        $currentVariants = Arr::get($this->attributes, 'variant', []);
        $this->setAttributes(array_merge($currentVariants, ['variant' => $variants]));

        return $this;
    }

    public function resolveVariantAttributes(array $attributes)
    {
        $variantPrefix = config('blade-components.variant_prefix') . '-';
        $variants = collect();
        $classes = $this->baseVariant ?? '';

        $variants = collect($variants)->merge(collect($attributes)
            ->filter(function ($value, $key) use ($variantPrefix) {
                return ($key === 'variant') || ($value && Str::of($key)->startsWith($variantPrefix));
            })
            ->reduceWithKeys(function ($collection, $value, $attribute) use ($variantPrefix, &$attributes) {
                if ($attribute === 'variant') {
                    foreach (Arr::wrap($value) as $item) {
                        $variant = (string)Str::of($item)->replace('-', '.');
                        $prefix = (string)Str::of($item)->replace('-', '.')->before('.');
                        if ($prefix === $variant) {
                            $collection->push((string)$variant);
                        } else {
                            $collection->put($prefix, (string)$variant);
                        }
                    }
                } else {
                    $variant = (string)Str::of($attribute)->ltrim($variantPrefix)->replace('-', '.');
                    $prefix = (string)Str::of($attribute)->ltrim($variantPrefix)->replace('-', '.')->before('.');
                    if ($prefix === $variant) {
                        $collection->push((string)$variant);
                    } else {
                        $collection->put($prefix, (string)$variant);
                    }
                }

                unset($attributes[$attribute]);

                return $collection;
            }, new Collection()));

        if (!$variants->count()) {
            if ($this->defaultVariant !== null) {
                foreach (Arr::wrap($this->defaultVariant) as $defaultVariantKey) {
                    $variant = (string)Str::of($defaultVariantKey)->replace('-', '.');
                    $prefix = (string)Str::of($defaultVariantKey)->before('.');
                    if ($prefix === $variant) {
                        $variants->push((string)$variant);
                    } else {
                        $variants->put($prefix, (string)$variant);
                    }
                }
            }
        }

        $classes .= ' ' . $variants->map(function ($value) {
                return Arr::get($this->variants, $value);
            })->join(' ');

        if (isset($attributes['class'])) {
            $newClasses = collect(explode(' ', $attributes['class']));
            $prefixArray = $newClasses->map(function ($class) {
                return (string)Str::of($class)->before('-');
            })->toArray();

            $classes = collect(explode(' ', $classes))->filter(function ($class) use ($prefixArray) {
                return !Str::of($class)->startsWith($prefixArray);
            })->merge($newClasses)->join(' ');
        }

        $attributes['class'] = $classes;

        return $attributes;
    }
}
