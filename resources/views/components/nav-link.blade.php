@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 text-blue-600 font-semibold border-b-2 border-blue-600'
            : 'inline-flex items-center px-3 py-2 text-gray-600 hover:text-blue-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
