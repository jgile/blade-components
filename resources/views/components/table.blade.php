<div dusk="table" {{ $attributes }}>
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