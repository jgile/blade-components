<div dusk="alert" {{ $attributes }}>
    <div class="flex">
        <div>
            <span class="fa-stack mt-1" style="font-size: .5em">
                <i class="{{ $attributes->variant('icon-bg') }} fa-stack-2x"></i>
                <i class="{{ $attributes->variant('icon') }} fa-stack-1x"></i>
            </span>
        </div>
        <div class="flex items-center">
            @if($title)
                <h3 class="ml-3 text-sm font-medium">
                    {{ $title }}
                </h3>
            @endif
            @isset($slot)
                <div>
                    <div class="text-sm ml-3">{{ $slot }}</div>
                </div>
            @endisset
        </div>
    </div>
</div>
