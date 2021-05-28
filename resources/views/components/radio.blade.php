<div dusk="radio-{{$name}}" {{ $attributes->class(['radio-component']) }}>
    <input
        {{ $attributes->except(['class']) }}
        class="radio-component-input"
        type="radio"
        id="{{ $id }}"
        name="{{$name}}"
        value="{{$value}}"
    >
    <label for="{{ $id }}" class="radio-component-label">
        {{ $slot }}
    </label>
</div>