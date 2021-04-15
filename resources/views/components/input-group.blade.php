<div {{ $attributes->merge(['class' => 'mt-2']) }}>
    @if($label)
        <x-blade-components::label :for="$for" :value="$label"/>
    @endif
    {{ $slot }}
    @if($validate)
        <x-blade-components::validation-error class="mt-1" :for="$validate"/>
    @endif
</div>