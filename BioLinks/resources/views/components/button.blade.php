@props([
    'href' => null,
    'wide' => null,
    'outline' => null,
    'color' => 'primary',
    'ghost' => null,
])

@php
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }} {{ $href ? "href=$href" : '' }}
{{ $attributes->class([
    'btn',
    "btn-{$color}",
    'btn-wide' => $wide,
    'btn-outline' => $outline,
    'text-center',
    'btn-ghost' => $ghost,
])
}}>
{{ $slot }}
</{{ $tag }}>
