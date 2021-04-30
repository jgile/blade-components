@if($attributes->has('href'))
    <a {{ $attributes }}>
        {{ $slot }}
        @if($loading)
            <span class="bg-white bg-opacity-75 absolute inset-0 flex items-center justify-center">
                <x-spinner></x-spinner>
            </span>
        @endif
    </a>
@else
    <button {{ $attributes }}>
        {{ $slot }}
        @if($loading)
            <span class="bg-white bg-opacity-75 absolute inset-0 flex items-center justify-center">
                <x-spinner></x-spinner>
            </span>
        @endif
    </button>
@endif
