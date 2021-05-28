<div dusk="{{ $name ? "checkbox-$name" : "checkbox" }}" {{ $attributes->merge(['class' => 'checkbox-component']) }}>
    <input
        type="checkbox"
        class="checkbox-component-input"
        {{ $attributes->except('class') }}
        id="{{$id}}"
        @if($name)
        name="{{ $name }}"
        @endif
        @if($value)
        value="{{ $value }}"
        @endif
    />
    <label for="{{ $id }}" class="checkbox-component-label">
        {{ $slot }}
    </label>
</div>