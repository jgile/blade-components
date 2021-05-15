<div dusk="{{ $name ? "checkbox-$name" : "checkbox" }}" class="flex items-center">
    <input
        type="checkbox"
        id="{{$id}}"
        @if($name)
        name="{{ $name }}"
        @endif
        @if($value)
        value="{{ $value }}"
        @endif
        {{ $attributes }}
    />
    <label for="{{ $id }}" class="ml-3 block text-sm font-medium text-gray-700">
        {{ $slot }}
    </label>
</div>