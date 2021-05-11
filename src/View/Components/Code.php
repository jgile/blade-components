<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Code extends Component
{
    public bool $trim = true;
    public string $language;
    public ?string $code;

    public function __construct(string $language, string $code = null, bool $trim = true)
    {
        $this->trim = $trim;
        $this->language = $language;
        $this->code = $trim && $code ? $this->trimCode($code) : $code;
    }

    public function trimCode($code)
    {
        if (!$this->trim) {
            return $code;
        }

        $code = Str::of($code->toHtml())->trim();
        $whiteSpaceLength = $code->explode("\n")->reduce(function ($length, $line) {
            $currentLength = Str::of($line)->length() - Str::of($line)->ltrim()->length();

            if ($currentLength > 0 && $currentLength < $length) {
                return $currentLength;
            }

            return $length;
        }, PHP_INT_MAX);

        return $whiteSpaceLength === null ? (string)$code : $code->explode("\n")->map(function ($line) use ($whiteSpaceLength) {
            $line = Str::of($line);
            $lineWhiteSpaceCount = $line->length() - $line->ltrim()->length();
            return $lineWhiteSpaceCount >= $whiteSpaceLength ? (string)$line->substr($whiteSpaceLength) : (string)$line;
        })->join("\n");
    }

    public function render()
    {
        return view('blade-components::components.code');
    }
}