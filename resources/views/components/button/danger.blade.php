<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-full border border-transparent bg-red-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-white shadow-sm shadow-red-200 transition duration-150 ease-in-out hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
