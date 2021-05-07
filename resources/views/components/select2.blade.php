<div>
    <div
        class="mt-1 relative"
        @if($attributes->has('wire:model'))
        x-data="alpineX.select2({value: @entangle($attributes->wire('model'))})"
        x-init="$watch('value', function(newVal){ selectValue($dispatch, newVal); ray('hit'); }); selectValue($dispatch, value)"
        @else
        x-data="alpineX.select2({value: null})"
        x-init="$bind('{{ $attributes->get('x-model') }}', function(newVal){selectValue($dispatch, newVal);})"
        @endif
    >
        <div x-text="value"></div>
        <button
            type="button"
            class="select-none relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            x-ref="button"
            @keydown.arrow-up.stop.prevent="onButtonClick()"
            @keydown.arrow-down.stop.prevent="onButtonClick()"
            @click="onButtonClick()"
            aria-haspopup="listbox"
            :aria-expanded="open"
            aria-labelledby="listbox-label"
        >
            <span class="h-6 flex items-center">
                <span x-text="label" class="ml-3 block truncate"></span>
            </span>
            <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                <i class="fas fa-sort"></i>
            </span>
        </button>
        <ul
            x-show="open"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
            @click.away="open = false"
            @keydown.enter.stop.prevent="selectActiveIndex($dispatch)"
            @keydown.space.stop.prevent="selectActiveIndex($dispatch)"
            @keydown.escape="onEscape()"
            @keydown.arrow-up.prevent="onArrowUp()"
            @keydown.arrow-down.prevent="onArrowDown()"
            x-ref="listbox"
            tabindex="-1"
            role="listbox"
            aria-labelledby="listbox-label"
            style="display: none;"
        >
            @foreach($options as $index => $option)
                <li
                    data-index="{{ $index }}"
                    data-label="{{ $option['label'] }}"
                    data-value="{{ $option['value'] }}"
                    class="cursor-default select-none relative py-2 pl-3 pr-9"
                    :class="{'bg-indigo-600 text-white': activeIndex === {{ $index }}, 'text-gray-900': activeIndex !== {{ $index }}}"
                    role="option"
                    @click="selectIndex($dispatch, {{$index}})"
                    @mouseenter="activeIndex = {{ $index }}"
                    @mouseleave="activeIndex = null"
                    tabindex="-1"
                >
                    <div class="flex items-center">
                        <span
                            class="ml-3 block truncate font-semibold"
                            :class="{ 'font-semibold': value === '{{ $option["value"] }}', 'font-normal': value !== '{{ $option["value"] }}' }"
                        >
                            {{ $option['label'] }}
                        </span>
                    </div>
                    <span
                        x-show="value === '{{ $option["value"] }}'"
                        class="absolute inset-y-0 right-0 flex items-center pr-4"
                        :class="{'text-white': activeIndex === {{ $index }}, 'text-indigo-600': activeIndex !== {{ $index }} }"
                    >
                        <i class="far fa-check"></i>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
