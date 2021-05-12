@once
    @push('head')
        <style>
            select {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20' %3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4' /%3e%3c/svg%3e");
                background-position: right .5rem center;
                background-repeat: no-repeat;
                background-size: 1.5em 1.5em;
                padding-right: 2.5rem;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
        </style>
    @endpush
@endonce
<select
    id="{{ $id }}"
    name="{{ $name }}"
    {{ $attributes->merge(['class' => 'select']) }}
>
    @if($placeholder !== null)
        <option value="" disabled selected>{{ $placeholder }}</option>
    @endif
    @if($allow_empty)
        <option value="" selected></option>
    @endif
    @if($options)
        @foreach($options as $option)
            <option value="{{ $option['value'] }}">{{$option['label']}}</option>
        @endforeach
    @endif
    {{ $slot }}
</select>