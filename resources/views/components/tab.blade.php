@php
    $activeClass = $attributes->variant('active');
    $inactiveClass = $attributes->variant('inactive');
@endphp
@if($attributes->has('href'))
    <a dusk="tab" {{ $attributes->merge(['class' => $active ? $activeClass : $inactiveClass]) }}>
        {{ $slot }}
    </a>
@else
    <button dusk="tab" {{ $attributes->merge(['class' => $active ? $activeClass : $inactiveClass]) }}>
        {{ $slot }}
    </button>
@endif