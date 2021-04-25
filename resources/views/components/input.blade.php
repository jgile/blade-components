@if(isset($prefix) || isset($suffix))
    <div class="relative">
        @isset($prefix)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                {{ $prefix }}
            </div>
        @endisset
        <input  name="{{ $name }}" {{ $attributes }} />
        @isset($suffix)
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                {{ $suffix }}
            </div>
        @endisset
    </div>
@else
    <input name="{{ $name }}" {{ $attributes->mergeVariantIf($errors->has($name),'error') }} />
@endif
