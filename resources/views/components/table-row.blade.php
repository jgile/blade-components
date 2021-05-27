<div dusk="tr" {{ $attributes }}>
    @if($data)
        @foreach($data as $k => $cell)
            <x-td :key="$cell['key']. $k">
                {{ $cell['value'] }}
            </x-td>
        @endforeach
    @endif
    @if($headers)
        @foreach($headers as $k => $cell)
            <x-th :key="$cell['key']. $k">
                {{ $cell['value'] }}
            </x-th>
        @endforeach
    @endif
    {{ $slot }}
</div>
