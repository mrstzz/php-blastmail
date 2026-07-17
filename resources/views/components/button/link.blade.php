
@props([
    'secondary' => null
])

<a {{ $attributes->class([
    'inline-flex items-center justify-center rounded-full border px-5 py-2.5 text-xs font-semibold uppercase tracking-wider transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-emerald-400/60 focus:ring-offset-2',
    'border-transparent bg-slate-950 text-white shadow-sm shadow-slate-300/70 hover:bg-slate-800 active:bg-slate-900' => !$secondary,
    'border-slate-200 bg-white/90 text-slate-700 shadow-sm hover:border-slate-300 hover:bg-slate-50 disabled:opacity-25' => $secondary ]) }}>
    {{ $slot }}
</a>
