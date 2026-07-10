

@props([
    'danger' => null,
    'warning' => null
])


<span {{ $attributes->class([
    'rounded-radius w-fit border rounded-full border-outline bg-surface-alt px-2 py-1 text-xs font-medium text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark',
    'bg-red-100 text-red-800 rounded-full dark:bg-red-500/20 dark:text-red-400' => $danger,
    'bg-amber-100 text-amber-800 rounded-full dark:bg-amber-500/20 dark:text-amber-400' => $warning,

]) }}>

    {{ $slot }}
</span>