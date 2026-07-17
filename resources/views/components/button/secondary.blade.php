
@props([
    'danger' => null,
])


<button {{ $attributes
    ->merge(['type' => 'button'])
    ->class([
        'inline-flex items-center justify-center rounded-full border px-4 py-2 text-xs font-semibold uppercase tracking-wider transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-25',
        'border-slate-200 bg-white/90 text-slate-700 shadow-sm hover:border-slate-300 hover:bg-slate-50 focus:ring-emerald-400/60' => !$danger,
        'border-red-200 bg-white/90 text-red-700 shadow-sm hover:border-red-300 hover:bg-red-50 focus:ring-red-400/60' => $danger,
        ]),
    }}>
    {{ $slot }}
</button>
