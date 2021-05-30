@if($attributes->has('href'))
    <a dusk="button" {{ $attributes->merge(['class' => 'button-component']) }}>
        {{ $slot }}
        @if($loading)
            <span class="bg-white bg-opacity-75 absolute inset-0 flex items-center justify-center">
                <x-blade-components::spinner></x-blade-components::spinner>
            </span>
        @endif
    </a>
@else
    <button dusk="button" {{ $attributes->merge(['class' => 'button-component']) }}>
        {{ $slot }}
        @if($loading)
            <span class="bg-white bg-opacity-75 absolute inset-0 flex items-center justify-center">
                <x-blade-components::spinner></x-blade-components::spinner>
            </span>
        @endif
    </button>
@endif