<div dusk="card" {{ $attributes }}>
    @if($title)
        <div class="px-4 py-3 border-b border-gray-200 sm:px-6">
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
    <div class="@if(!$flush) px-4 py-6 sm:p-6 @endif">
        {{ $slot }}
    </div>
</div>
