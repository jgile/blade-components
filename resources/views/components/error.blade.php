@if($show)
    <div dusk="error-{{$for}}" {{ $attributes->merge(['class'=> 'error-component']) }}>
        @if ($slot->isEmpty())
            {{ $message }}
        @else
            {{ $slot }}
        @endif
    </div>
@else
    @error($for, $bag)
    <div dusk="error-{{$for}}" {{ $attributes->merge(['class'=> 'error-component']) }}>
        @if ($slot->isEmpty())
            {{ $message }}
        @else
            {{ $slot }}
        @endif
    </div>
    @enderror
@endif