@props(['config' => '{}'])
<input
    x-data="{}"
    x-init="() => flatpickr($el, <?php echo $config ?>)"
    type="text"
    {{ $attributes->merge(['class' => 'bg-white block rounded-md border-gray-300 border box-border mx-0 mb-0 mt-1 py-2 px-3 cursor-text text-base leading-normal shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}
/>
