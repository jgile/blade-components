<select
    dusk="select-{{$name}}"
    id="{{ $id }}"
    name="{{ $name }}"
    {{ $attributes->merge(['class' => 'select-component']) }}
>
    @if($placeholder !== null)
        <option value="" selected>{{ $placeholder }}</option>
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

