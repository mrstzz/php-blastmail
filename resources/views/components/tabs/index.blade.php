@props([
    'tabs' => [],
])


<div class="w-full">
    <div class="flex gap-2 overflow-x-auto border-b border-slate-300  dark:border-slate-700">
        @foreach ($tabs as $title => $route)
            @php
                $selected = request()->getUri() == $route;
            @endphp

            <a href="{{ $route }}" @class([
                'h-min px-4 py-2 text-sm',
                'font-bold text-blue-700 border-b-2 border-blue-700 dark:border-blue-600 dark:text-blue-600' => $selected,
                'text-on-surface font-medium dark:text-on-surface-dark dark:hover:border-b-outline-dark-strong dark:hover:text-on-surface-dark-strong hover:border-b-2 hover:border-b-outline-strong hover:text-on-surface-strong' => !$selected,
            ])>
                {{ $title }}
            </a>
        @endforeach
    </div>

    <div class="px-2 py-4 text-neutral-600 dark:text-dark-400">
        {{ $slot }}
    </div>
</div>
