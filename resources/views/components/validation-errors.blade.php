@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="{{ config('blade-components.classes.validation-errors') }}">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif