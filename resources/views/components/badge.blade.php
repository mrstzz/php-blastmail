

@props([
    'danger' => null,
    'warning' => null
])




<span {{ $attributes->class([
    'py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium',
    'bg-red-100 text-red-800 rounded-full dark:bg-red-500/20 dark:text-red-400' => $danger,
    'bg-amber-100 text-amber-800 rounded-full dark:bg-amber-500/20 dark:text-amber-400' => $warning,

]) }}>

    {{ $slot }}
</span>