@props(['value'])
<label {{ $attributes->merge(['class' => config('blade-components.classes.label')]) }}>
    {{ $value ?? $slot }}
</label>