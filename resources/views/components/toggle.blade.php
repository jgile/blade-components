<button
    x-cloak
    x-data="{ on: false }"
    x-init="@bindAlpine('on')"
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