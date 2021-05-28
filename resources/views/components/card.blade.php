<div dusk="card" {{ $attributes->merge(['class' => 'card-component']) }}>
    @if($title)
        <div class="card-component-header">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $title }}
                    </h3>
                </div>
                @isset($header)
                    <div class="ml-4 mt-2 flex-shrink-0">
                        {{ $header }}
                    </div>
                @endisset
            </div>
        </div>
    @endif
    <div class="card-component-content">
        {{ $slot }}
    </div>
</div>
