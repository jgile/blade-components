<select
    id="{{ $id }}"
    name="{{ $name }}"
    {{ $attributes }}
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
