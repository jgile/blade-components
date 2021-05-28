<div dusk="alert" {{ $attributes->merge(['class' => 'alert']) }}>
    @if($title)
        <h3>{{ $title }}</h3>
    @endif
    {{ $slot ?? '' }}
</div>