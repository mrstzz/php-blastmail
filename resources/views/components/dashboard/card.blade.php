@props([
    'heading',
    'subheading'
])

<div class="rounded-2xl border border-slate-200 bg-white/90 p-8 text-center shadow-sm shadow-slate-200/60">
    <div class="font-mono text-5xl font-semibold tracking-tight text-slate-950">{{ $heading }}</div>
    <div class="mt-2 text-sm font-semibold uppercase tracking-wider text-slate-500">{{ $subheading }}</div>
</div>
