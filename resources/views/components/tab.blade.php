@if($attributes->has('href'))
    <a dusk="tab" {{ $attributes->class(['tab-component' => true, 'active' => $active])->merge() }}>
        {{ $slot }}
    </a>
@else
    <button dusk="tab" {{ $attributes->class(['tab-component' => true, 'active' => $active])->merge() }}>
        {{ $slot }}
    </button>
@endif