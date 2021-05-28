<div dusk="{{ $for ? "form-group-$for" : "form-group" }}" {{ $attributes->merge(['class' => 'form-group']) }}>
    @if($label && $for)
        <x-blade-components::label class="form-group-label" :for="$for">
            {{ $label }}
        </x-blade-components::label>
    @endif
    {{ $slot }}
    @if($description)
        <x-blade-components::p class="muted">{{ $description }}</x-blade-components::p>
    @endif
    @if($validate)
        <x-blade-components::error :for="$validate"/>
    @endif
</div>