<div {{ $attributes }}>
    <div class="flex">
        <div class="flex-shrink-0 flex items-center">
            @if($icon)
                <span class="fa-stack" style="font-size: .5em">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="{{ $icon }} fa-stack-1x fa-inverse"></i>
                </span>
            @endif
            @if($title)
                <h3 class="ml-3 text-sm font-medium">
                    {{ $title }}
                </h3>
            @endif
        </div>
        <div class="ml-3">
            <div class="text-sm text-red-700">
                @if(!empty($list))
                    <ul class="mt-2 list-disc pl-5 space-y-1">
                        @foreach($list as $listItem)
                            <li>{{$listItem}}</li>
                        @endforeach
                    </ul>
                @endif
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
