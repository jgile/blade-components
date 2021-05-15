@once
    @push('head')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism-okaidia.css">
    @endpush
@endonce
@once
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/components/prism-core.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/plugins/autoloader/prism-autoloader.min.js"></script>
    @endpush
@endonce
<div dusk="code">
<pre class="language-{{$language}} block scrollbar-none m-0 p-0 overflow-auto text-white text-sm leading-normal">
<code class="inline-block p-4 scrolling-touch subpixel-antialiased">{{ $trimCode($slot) }}</code>
</pre>
</div>
