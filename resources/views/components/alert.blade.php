<div dusk="alert" {{ $attributes }}>
    <div class="block fa-stack mt-1" style="font-size: .5em">
        <i class="{{ $attributes->variant('icon-bg') }} fa-stack-2x"></i>
        <i class="{{ $attributes->variant('icon') }} fa-stack-1x"></i>
    </div>
    <div class="flex-grow">
        @if($title)
            <h3 class="ml-3 text-sm font-bold">
                {{ $title }}
            </h3>
        @endif
        {{ $slot ?? '' }}
    </div>
</div>