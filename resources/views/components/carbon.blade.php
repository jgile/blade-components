@if ($human)
<time dusk="carbon" datetime="{{ $date->format($format) }}" {{ $attributes }}>
    {{ $date->diffForHumans() }}
</time>
@elseif ($local !== null)
<span
    dusk="carbon"
    x-data="{
    formatLocalTimeZone: function (element, timestamp) {
        const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        const date = moment.unix(timestamp).tz(timeZone);
        element.innerHTML = date.format('{{ $local !== true ? $local : 'YYYY-MM-DD HH:mm:ss (z)' }}');
    }
    }"
    x-init="formatLocalTimeZone($el, {{ $date->timestamp }})"
    title="{{ $date->diffForHumans() }}"
    {{ $attributes }}
>
    {{ $date->format('Y-m-d H:i:s') }}
</span>
@else
<span dusk="carbon" title="{{ $date->diffForHumans() }}" {{ $attributes }}>
    {{ $date->format($format) }}
</span>
@endif