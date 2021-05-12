<div {{ $attributes }}>
    @if($label && $for)
        <x-label class="mb-1" :for="$for">
            {{ $label }}
        </x-label>
    @endif
    {{ $slot }}
    @if($description)
        <x-p v-muted>{{ $description }}</x-p>
    @endif
    @if($validate)
        <x-error :for="$validate"/>
    @endif
</div>