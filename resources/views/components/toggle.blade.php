<button
    x-cloak
    dusk="toggle-{{ $attributes->get('name') }}"
    x-data="{ on: false }"
    x-state:on="Enabled"
    x-state:off="Not Enabled"
    :aria-pressed="on.toString()"
    :class="{ 'bg-indigo-600': on, 'bg-gray-200': !(on) }"
    {{ $attributes->except(['x-model'])->merge(['class' => config('blade-components.classes.toggle.button')]) }}
    @click="on = !on"
    type="button"
    aria-pressed="false"
>
    <span
        aria-hidden="true"
        class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"
        x-state:on="Enabled"
        x-state:off="Not Enabled"
        :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }"
    >
    </span>
</button>


<button
    type="button"
    class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    role="switch"
    aria-checked="false"
>
    <span class="sr-only">Use setting</span>
    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
    <span aria-hidden="true" class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
</button>