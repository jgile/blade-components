@php
    $id = $id ?? md5($action);
@endphp
<form dusk="form-{{$id}}" id="{{$id}}" method="{{ $method !== 'GET' ? 'POST' : 'GET' }}"
      action="{{ $action }}" {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!} {{ $attributes }}>
    @csrf
    @method($method)
    {{ $slot }}
</form>