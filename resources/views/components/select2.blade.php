@once
    @push('head')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0-beta.41/dist/themes/base.css">
        <script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0-beta.41/dist/shoelace.js"></script>
    @endpush
@endonce
<sl-select {{ $attributes }}>
    @foreach($options as $option)
        <sl-menu-item value="{{ $option['value'] }}">{{ $option['label'] }}</sl-menu-item>
    @endforeach
</sl-select>