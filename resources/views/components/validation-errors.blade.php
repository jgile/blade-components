@if ($errors->any())
    <div dusk="validation-errors" {{ $attributes->merge(['class' => 'validation-errors-component']) }}>
        <ul class="validation-errors-component-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif