@once('shoelace')
    @push('head')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0-beta.41/dist/themes/base.css">
        <script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0-beta.41/dist/shoelace.js"></script>
    @endpush
@endonce
<sl-select
    {{ $attributes->except('x-model') }}
    @if($attributes->has('x-model'))
    x-bind:value="{{ $attributes->get('x-model') }}" x-on:sl-change="{{ $attributes->get('x-model') }}=$event.target.value"
    @elseif($attributes->has('wire:model'))
    wire:ignore
    wire:sl-change.self="$set('{{ $attributes->wire("model")->value() }}', $event.target.value)"
    @endif
>
    @foreach($options as $option)
        <sl-menu-item value="{{ $option['value'] }}">{{ $option['label'] }}</sl-menu-item>
    @endforeach
    {{ $slot }}
</sl-select>