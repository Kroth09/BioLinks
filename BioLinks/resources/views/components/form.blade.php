@props([
    'route',
    'path' => null,
    'params' => [],
    'method' => 'post',
])

@php
    $action = $route ?? ($path ? route($path, $params) : '#')
@endphp

<form {{ $attributes->except(['method'])->merge(['class' => 'flex flex-col gap-4']) }} action="{{ $action }}" method="post">
    @csrf

    @if(!in_array(strtolower($method), ['get', 'post']))
        @method($method)
    @endif

    {{ $slot }}
</form>
