<div {{ $attributes }}>
    @if($label)
        <x-label :for="$for">
            {{ $label }}
        </x-label>
    @endif
    <div class="mt-1">
        {{ $slot }}
    </div>
    @if($description)
        <x-input-description>
            {{ $description }}
        </x-input-description>
    @endif
    @if($validate)
        <x-input-error :for="$validate"/>
    @endif
</div>