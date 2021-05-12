<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $title = $title ?? config('app.name');
    @endphp
    <x-social-meta :title="$title"/>
    <title>{{ $title }}</title>
    @stack('head')
</head>
<body {{ $attributes }}>
{{ $slot }}
@stack('scripts')
</body>
</html>