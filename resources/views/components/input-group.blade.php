<div {{ $attributes }}>
    @if($label && $for)
        <x-label :for="$for">
            {{ $label }}
        </x-label>
    @endif
    <div class="mt-1">
        {{ $slot }}
    </div>
    @if($description)
        <x-p v-muted>{{ $description }}</x-p>
    @endif
    @if($validate)
        <x-error :for="$validate"/>
    @endif
</div>