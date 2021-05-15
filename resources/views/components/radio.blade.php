<div dusk="radio-{{$name}}" class="flex items-center">
    <input
        {{ $attributes }}
        type="radio"
        id="{{ $id }}"
        name="{{$name}}"
        value="{{$value}}"
    >
    <label for="{{ $id }}" class="ml-3 block text-sm font-medium text-gray-700">
        {{ $slot }}
    </label>
</div>