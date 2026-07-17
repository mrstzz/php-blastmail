@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full border-l-4 border-emerald-400 bg-slate-950/95 py-3 pe-4 ps-4 text-start text-base font-semibold text-white focus:outline-none transition duration-150 ease-in-out'
            : 'block w-full border-l-4 border-transparent py-3 pe-4 ps-4 text-start text-base font-medium text-slate-600 hover:border-slate-300 hover:bg-slate-50 hover:text-slate-950 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
