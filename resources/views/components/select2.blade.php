<div
    x-data="{
        modelName: 'selected',
        open: false,
        activeIndex: 0,
        numberOfOptions: null,
        selectedOption: null,
        get selected() {
            return this.selectedOption ?? {value: null, label: ''}
        },
        get optionCount(){
            if(this.numberOfOptions === null){
                this.numberOfOptions = this.$refs.listbox.children.length
            }
            return this.numberOfOptions;
        },
        onButtonClick() {
            if (!this.open) {
                this.open = true

                if(this.selected.value){
                    this.activeIndex = parseInt(this.$refs['option-' + this.selected.value].dataset.index);
                }

                this.$nextTick(() => {
                    this.$refs.listbox.focus();
                    if(this.$refs['option-' + this.selected.value]){
                        this.$refs['option-' + this.selected.value].scrollIntoView({block: 'nearest'});
                    }
                })
            }
        },
        choose(index, value, label) {
            this.selectedOption = {'label': label, 'value': value};
            this.open = false;
            //this.emitSelection();
        },
        onOptionSelect() {
            null !== this.activeIndex && (this.selectedOption = this.items[this.activeIndex])
            this.open = false;
            this.$refs.button.focus();
            //this.emitSelection();
        },
        onEscape() {
            this.open = false;
            this.$refs.button.focus();
        },
        onArrowUp() {
            this.activeIndex = this.activeIndex - 1 < 0 ? this.optionCount - 1 : this.activeIndex - 1
            this.$refs.listbox.children[this.activeIndex].scrollIntoView({block: 'nearest'})
        },
        onArrowDown() {
            this.activeIndex = this.activeIndex + 1 > this.optionCount - 1 ? 0 : this.activeIndex + 1
            this.$refs.listbox.children[this.activeIndex].scrollIntoView({block: 'nearest'})
        },
        @if($attributes->has('x-model'))
        bind(){
            this.$parent.{{ $attributes->get('x-model') }} = this.$parent.{{ $attributes->get('x-model') }}
        },
        @endif
        items: {{ json_encode($options, true) }},
    }"
    x-init="$nextTick(() => bind())"
>
    <div class="mt-1 relative">
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
                <span x-text="selected.label" class="ml-3 block truncate"></span>
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
            @keydown.enter.stop.prevent="onOptionSelect()"
            @keydown.space.stop.prevent="onOptionSelect()"
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
                    x-ref="option-{{ $option["value"] }}"
                    data-index="{{ $index }}"
                    class="cursor-default select-none relative py-2 pl-3 pr-9"
                    :class="{'bg-indigo-600 text-white': activeIndex === {{ $index }}, 'text-gray-900': activeIndex !== {{ $index }}}"
                    role="option"
                    @click="choose({{$index}}, '{{ $option["value"] }}', '{{ $option["label"] }}')"
                    @mouseenter="activeIndex = {{ $index }}"
                    @mouseleave="activeIndex = null"
                    tabindex="-1"
                >
                    <div class="flex items-center">
                        <span
                            class="ml-3 block truncate font-semibold"
                            :class="{ 'font-semibold': selected.value === '{{ $option["value"] }}', 'font-normal': selected.value !== '{{ $option["value"] }}' }"
                        >
                            {{ $option['label'] }}
                        </span>
                    </div>
                    <span
                        x-show="selected.value === '{{ $option["value"] }}'"
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
