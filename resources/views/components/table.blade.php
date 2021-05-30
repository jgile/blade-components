<div dusk="table" {{ $attributes->merge(['class' => 'table-component']) }}>
    @isset($headers)
        <x-blade-components::tr>
            @foreach($headers as $header)
                <x-th>{{ $header }}</x-th>
            @endforeach
        </x-blade-components::tr>
    @else
        @isset($thead)
            {{ $thead }}
        @endisset
    @endif
    {{ $slot }}
    @isset($tfoot)
        {{ $tfoot }}
    @endisset
</div>