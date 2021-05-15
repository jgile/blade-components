@if ($errors->any())
    <div dusk="validation-errors" {{ $attributes }}>
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif