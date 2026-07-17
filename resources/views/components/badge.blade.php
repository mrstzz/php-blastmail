

@props([
    'danger' => null,
    'warning' => null
])


<span {{ $attributes->class([
    'w-fit rounded-full border border-slate-200 bg-slate-50 px-2.5 py-1 text-xs font-semibold text-slate-600',
    'border-red-200 bg-red-50 text-red-700' => $danger,
    'border-amber-200 bg-amber-50 text-amber-700' => $warning,

]) }}>

    {{ $slot }}
</span>
