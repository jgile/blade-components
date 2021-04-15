@props(['type' => 'text', 'name' => null, 'value' => 0, 'increment' => 1])
<div
    x-data="{
        value: <?php echo (string)$value ?>,
        increment(){
            this.value += <?php echo (string)$increment; ?>
        },
        decrement(){
            this.value -= <?php echo (string)$increment; ?>
        }
    }"
    {{ $attributes->merge(['class' => 'flex items-center']) }}
>
    <button class="" @click="decrement">
        -
    </button>
    <div class="flex-1">
        <input
            x-model.number="value"
            name="{{ $name }}"
            class="{{ config('blade-components.classes.number-step.input') }}"
            type="text"
        />
    </div>
    <button class="{{ config('blade-components.classes.number-step.increment') }}" @click="increment">
        +
    </button>
</div>
