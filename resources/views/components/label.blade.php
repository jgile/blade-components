<label {{ $attributes->has('for') ? "label-".$attributes->has('for') : "label" }} {{ $attributes->merge(['class' => 'label-component']) }}>
    {{ $value ?? $slot }}
</label>