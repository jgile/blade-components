<label {{ $attributes->has('for') ? "label-".$attributes->has('for') : "label" }} {{ $attributes }}>
    {{ $value ?? $slot }}
</label>