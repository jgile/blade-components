<div {{ $attributes }}>
    <div class="flex">
        <div class="flex-shrink-0 flex items-center">
            <span class="fa-stack" style="font-size: .5em">
                <i class="{{ $attributes->variant('icon-bg') }} fa-stack-2x"></i>
                <i class="{{ $attributes->variant('icon') }} fa-stack-1x"></i>
            </span>
            @if($title)
                <h3 class="ml-3 text-sm font-medium">
                    {{ $title }}
                </h3>
            @endif
            @isset($slot)
                <div class="text-sm text-red-700 ml-3">{{ $slot }}</div>
            @endisset
        </div>
    </div>
</div>
