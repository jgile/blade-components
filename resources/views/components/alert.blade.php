<div dusk="alert" {{ $attributes }}>
    @if($title)
        <h3 class="mb-1 font-bold">
            {{ $title }}
        </h3>
    @endif
    {{ $slot ?? '' }}
</div>