@once
    @push('scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @endpush
@endonce
<input
    x-data="{}"
    x-init="() => flatpickr($el, <?php echo $config ?>)"
    type="text"
    {{ $attributes }}
/>