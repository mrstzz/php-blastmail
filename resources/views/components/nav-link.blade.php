@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold leading-5 text-white shadow-sm shadow-slate-300/70 focus:outline-none focus:ring-2 focus:ring-emerald-400/50 transition duration-150 ease-in-out'
            : 'inline-flex items-center rounded-full px-4 py-2 text-sm font-medium leading-5 text-slate-600 hover:bg-white/80 hover:text-slate-950 focus:outline-none focus:ring-2 focus:ring-emerald-400/50 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
