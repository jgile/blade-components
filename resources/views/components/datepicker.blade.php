@once
    @push('head')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @endpush
@endonce
<input
    dusk="datepicker-{{$name}}"
    x-data
    x-init="() => flatpickr($el, {{ $config }})"
    name="{{ $name }}"
    type="text"
    {{ $attributes }}
/>