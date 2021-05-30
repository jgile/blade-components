<div dusk="tr" {{ $attributes->merge(['class' => 'table-row-component']) }}>
    @if($data)
        @foreach($data as $k => $cell)
            <x-blade-components::td :key="$cell['key']. $k">
                {{ $cell['value'] }}
            </x-blade-components::td>
        @endforeach
    @endif
    @if($headers)
        @foreach($headers as $k => $cell)
            <x-blade-components::th :key="$cell['key']. $k">
                {{ $cell['value'] }}
            </x-blade-components::th>
        @endforeach
    @endif
    {{ $slot }}
</div>
