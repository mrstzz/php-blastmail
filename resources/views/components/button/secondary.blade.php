
@props([
    'danger' => null,
])


<button {{ $attributes
    ->merge(['type' => 'button'])
    ->class([
        'inline-flex items-center px-4 py-2 border font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150',
        'bg-white border-gray-300 rounded-md text-gray-700 shadow-sm hover:bg-gray-50 disabled:opacity-25' => !$danger,
        'bg-white border-red-300 rounded-md text-red-700 shadow-sm hover:bg-red-50 disabled:opacity-25' => $danger,
        ]),
    }}>
    {{ $slot }}
</button>
