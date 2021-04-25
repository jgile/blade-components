<div {{ $attributes }}>
    @if($label)
        <x-blade-components::label :for="$for">
            {{ $label }}
        </x-blade-components::label>
    @endif
    <div class="mt-1">
        {{ $slot }}
    </div>
    @if($description)
        <x-blade-components::input-description>
            {{ $description }}
        </x-blade-components::input-description>
    @endif
    @if($for)
        <x-blade-components::input-errors :for="$validate"/>
    @endif
</div>