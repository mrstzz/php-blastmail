@props([
    'heading',
    'subheading'
])

<div class="border-2 border-x-slate-700 p-8 bg-gray-100 text-center rounded-xl">
    <div class="font-medium text-5xl font-mono">{{ $heading }}</div>
    <div class="text-xl mt-1 opacity-80">{{ $subheading }}</div>
</div>