@once
    @push('scripts')
        <link href="https://cdn.quilljs.com/1.3.6/quill.{{ $theme }}.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    @endpush
@endonce
<div {{ $attributes->except(['value', 'wire:model', 'x-model']) }}>
    @if($attributes->has('wire:model'))
        <div
            wire:ignore
            x-data="{ quill: null, value: @entangle($attributes->wire('model')).defer, internalValue: null }"
            x-init="
            quill = new Quill($refs.quill, {theme: 'snow', placeholder: '{{ $placeholder }}', modules: {{ json_encode($modules) }} });
            quill.on('text-change', (delta) => {
                internalValue = quill.getContents()
                value = quill.getContents()
            });
            $watch('value', (newVal) => {
                if(JSON.stringify(newVal) !== JSON.stringify(internalValue)){
                    internalValue = newVal;
                    quill.setContents(newVal);
                }
            });
        "
        >
            <div x-ref="quill"></div>
        </div>
    @else
        <div
            wire:ignore
            x-data="{ quill: null }"
            x-init="$nextTick(() => {
                quill = new Quill($refs.quill, {theme: 'snow', placeholder: '{{ $placeholder }}', modules: {{ json_encode($modules) }} });
                quill.on('text-change', (delta, oldDelta, source) => {
                    @if($attributes->has('x-model'))
                    $parent.{{ $attributes->get('x-model') }} = quill.getContents();
                    @endif
                });
            })"
        >
            <div x-ref="quill"></div>
        </div>
    @endif
</div>
