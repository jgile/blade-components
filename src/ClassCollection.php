<?php

namespace JGile\BladeComponents;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ClassCollection extends Collection
{
    public function __construct($items = [])
    {
        $this->items = $this->getArrayableItems($items);
        $this->addClasses($this->join(' '));
    }

    public function putIf($condition, $key, $value, $elseValue = null)
    {
        if ($condition) {
            $this->put($key, $value);
        } elseif ($elseValue) {
            $this->put($key, $elseValue);
        }

        return $this;
    }

    public function pushIf($condition, $value, $elseValue = null)
    {
        if ($condition) {
            $this->push($value);
        } elseif ($elseValue) {
            $this->push($elseValue);
        }

        return $this;
    }

    public function addClasses(string $classes)
    {
        foreach (explode(' ', $classes) as $value) {
            $prefix = (string)Str::of($value)->before('-');
            $this->put($prefix, $value);
        }

        return $this;
    }

    public function toString()
    {
        return $this->filter()->join(' ');
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}