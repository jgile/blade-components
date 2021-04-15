@error($for)
<div {{ $attributes->merge(['class' => 'text-xs text-red-600']) }}>{{ $message }}</div>
@enderror