@once
    @push('scripts')
        <script>
            window.AlpineComponents = window.AlpineComponents || {};
            window.AlpineComponents.listbox = function (t) {
                return {
                    init(bindType, bindVal) {
                        this.optionCount = this.items.length;
                        this.$watch("activeIndex", (t => {
                            this.open && (null !== this.activeIndex ? this.activeDescendant = this.$refs.listbox.children[this.activeIndex].id : this.activeDescendant = "")
                        }))
                        if (bindType && bindType === 'alpine') {
                            this.selectedValue = this.$parent[bindVal];
                            this.selectedIndex = this.items.findIndex(item => item.value === this.selectedValue);
                            this.$parent.$watch(bindVal, (newVal) => {
                                if (newVal !== this.selectedValue) {
                                    this.selectedValue = newVal;
                                    this.selectedIndex = this.items.findIndex(item => item.value === newVal);
                                }
                            })
                            this.$watch('selectedIndex', () => {
                                this.selectedValue = this.selected.value;
                                this.$parent[bindVal] = this.selectedValue;
                            })
                        }

                        if (bindType && bindType === 'livewire') {
                            this.selectedIndex = this.items.findIndex(item => item.value === this.selectedValue);
                            this.$watch('selectedIndex', () => {
                                this.selectedValue = this.selected.value;
                            })
                            this.$watch('selectedValue', newVal => {
                                this.selectedIndex = this.items.findIndex(item => item.value === newVal);
                            })
                        }
                    },
                    activeDescendant: null,
                    open: false,
                    activeIndex: 0,
                    selectedIndex: 0,
                    selectedValue: null,
                    optionCount: 0,
                    get active() {
                        return this.items[this.activeIndex]
                    },
                    get selected() {
                        return this.items[this.selectedIndex] ?? {value: null, label: ''}
                    },
                    choose(t) {
                        this.selectedIndex = t
                        this.open = false
                    },
                    onButtonClick() {
                        if (!this.open) {
                            this.activeIndex = this.selectedIndex
                            this.open = true
                            this.$nextTick(() => {
                                this.$refs.listbox.focus()
                                this.$refs.listbox.children[this.activeIndex].scrollIntoView({block: "nearest"})
                            })
                        }
                    },
                    onOptionSelect() {
                        null !== this.activeIndex && (this.selectedIndex = this.activeIndex)
                        this.open = false
                        this.$refs.button.focus()
                    },
                    onEscape() {
                        this.open = false
                        this.$refs.button.focus()
                    },
                    onArrowUp() {
                        this.activeIndex = this.activeIndex - 1 < 0 ? this.optionCount - 1 : this.activeIndex - 1
                        this.$refs.listbox.children[this.activeIndex].scrollIntoView({block: "nearest"})
                    },
                    onArrowDown() {
                        this.activeIndex = this.activeIndex + 1 > this.optionCount - 1 ? 0 : this.activeIndex + 1
                        this.$refs.listbox.children[this.activeIndex].scrollIntoView({block: "nearest"})
                    },
                    ...t
                }
            };
        </script>
    @endpush
@endonce
<div {{ $attributes->except(['value', 'wire:model', 'x-model']) }}>
    <div
        x-cloak
{{--        @isset($__instance)--}}
{{--        x-data="AlpineComponents.listbox({--}}
{{--            items: {{ json_encode($options) }},--}}
{{--            selectedValue: @entangle($attributes->wire('model')),--}}
{{--        })"--}}
{{--        x-init="$nextTick(() => init('livewire'))"--}}
{{--        @else--}}
{{--        x-data="AlpineComponents.listbox({--}}
{{--            items: {{ json_encode($options) }}--}}
{{--        })"--}}
{{--        x-init="$nextTick(() => init('alpine', '{{ $attributes->get('x-model') }}'))"--}}
{{--        @endisset--}}
    >
        <div class="mt-1 relative">
            <button
                type="button"
                class="bg-white relative w-full border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                x-ref="button"
                @keydown.arrow-up.stop.prevent="onButtonClick()"
                @keydown.arrow-down.stop.prevent="onButtonClick()"
                @click="onButtonClick()"
                aria-haspopup="listbox"
                :aria-expanded="open"
                aria-expanded="true"
                aria-labelledby="listbox-label"
            >
                <span x-text="selected.label" class="block truncate"></span>
                <span class="absolute inset-y-0 right-3 flex items-center pr-2 pointer-events-none">
                    <i class="fas fa-sort"></i>
                </span>
            </button>
            <ul
                x-show="open"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                x-max="1"
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
                :aria-activedescendant="activeDescendant"
                aria-activedescendant=""
            >
                <template x-for="(item, index) in items">
                    <li
                        x-state:on="Highlighted"
                        x-state:off="Not Highlighted"
                        class="cursor-default select-none relative py-2 pl-3 pr-9 text-gray-900"
                        x-bind:id="'listbox-option-'+index"
                        role="option"
                        @click="choose(index)"
                        @mouseenter="activeIndex = index"
                        @mouseleave="activeIndex = null"
                        :class="{ 'text-white bg-indigo-600': activeIndex === index, 'text-gray-900': !(activeIndex === index) }"
                    >
                  <span
                      x-state:on="Selected"
                      x-state:off="Not Selected"
                      class="font-normal block truncate"
                      :class="{ 'font-semibold': selectedIndex === index, 'font-normal': !(selectedIndex === index) }"
                      x-text="item.label"
                  >
                  </span>
                        <span
                            x-state:on="Highlighted"
                            x-state:off="Not Highlighted"
                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                            :class="{ 'text-white': activeIndex === index, 'text-indigo-600': !(activeIndex === index) }"
                            x-show="selectedIndex === index"
                            style="display: none;"
                        >
                        <i class="far fa-check"></i>
                    </span>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</div>
