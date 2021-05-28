<div dusk="table" {{ $attributes->merge(['class' => 'table-component']) }}>
    @isset($headers)
        <x-tr>
            @foreach($headers as $header)
                <x-th>{{ $header }}</x-th>
            @endforeach
        </x-tr>
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