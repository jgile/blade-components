@php
    $activeClass = $attributes->variant('active');
    $inactiveClass = $attributes->variant('inactive');
@endphp
@if($attributes->has('href'))
    <a {{ $attributes->merge(['class' => $active ? $activeClass : $inactiveClass]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $active ? $activeClass : $inactiveClass]) }}>
        {{ $slot }}
    </button>
@endif