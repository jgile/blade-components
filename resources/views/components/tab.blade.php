@php
    $activeClass = $attributes->variant('active');
    $inactiveClass = $attributes->variant('inactive');
@endphp
<button {{ $attributes->merge(['class' => $active ? $activeClass : $inactiveClass]) }}>
    {{ $slot }}
</button>